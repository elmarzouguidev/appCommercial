<?php

namespace App\Http\Controllers\Commercial\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Commercial\Invoice\DeleteArticleFormRequest;
use App\Http\Requests\Commercial\Invoice\InvoiceFormRequest;
use App\Http\Requests\Commercial\Invoice\InvoiceUpdateFormRequest;
use App\Models\Finance\Article;
use App\Models\Finance\Company;
use App\Models\Finance\Estimate;
use App\Models\Finance\Invoice;
use App\Models\Ticket;
use App\Repositories\Client\ClientInterface;
use App\Repositories\Company\CompanyInterface;
use App\Services\Commercial\Taxes\TVACalulator;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class InvoiceController extends Controller
{

    use TVACalulator;

    public function indexFilter()
    {
        if (request()->has('appFilter') && request()->filled('appFilter')) {

            $invoices = QueryBuilder::for(Invoice::class)
                ->allowedFilters([
                    //'company_id'
                    //AllowedFilter::exact('etat')
                    AllowedFilter::scope('GetCompany', 'filters_companies'),
                    AllowedFilter::scope('GetStatus', 'filters_status'),
                    AllowedFilter::scope('GetClient', 'filters_clients'),

                ])
                ->with(['company', 'client'])
                ->withCount('avoir')
                ->paginate(100)
                ->appends(request()->query());
            //->get();
        } else {
            $invoices = Invoice::with(['company', 'client', 'bill'])->withCount('bill')
                ->withCount(['avoir'])
                //->with('avoir')
                ->get();
        }

        $clients = app(ClientInterface::class)->getClients(['id', 'uuid', 'entreprise', 'contact']);

        $companies = Company::select(['id', 'name', 'uuid'])->get();

        return view('theme.pages.Commercial.Invoice.index', compact('invoices', 'companies', 'clients'));
    }

    public function index()
    {
        $invoices = Invoice::with(['company', 'client'])->paginate(5);

        return view('theme.pages.Commercial.Invoice.index', compact('invoices'));
    }

    public function create()
    {
        if (request()->has('ticket')) {

            $ticket = Ticket::whereUuid(request()->ticket)->firstOrFail();
            $companies = app(CompanyInterface::class)->getCompanies(['id', 'name']);
            return view('theme.pages.Commercial.Invoice.__create.index', compact('ticket', 'companies'));
        }

        return view('theme.pages.Commercial.Invoice.__create.index');
    }

    public function createAvoir()
    {

        $clients = app(ClientInterface::class)->getClients(['id', 'entreprise', 'contact']);
        $companies = app(CompanyInterface::class)->getCompanies(['id', 'name']);

        return view('theme.pages.Commercial.Invoice.__create_avoir.index', compact('clients', 'companies'));
    }


    public function single(Invoice $invoice)
    {
        $invoice->load('articles');
        return view('theme.pages.Commercial.Invoice.__detail.index', compact('invoice'));
    }


    public function store(InvoiceFormRequest $request)
    {
        // dd($request->all());

        $articles = $request->articles;

        $totalPrice = collect($articles)->map(function ($item) {
            return $item['prix_unitaire'] * $item['quantity'];
        })->sum();

        $invoicesArticles = collect($articles)->map(function ($item) {
            return collect($item)->merge(['montant_ht' => $item['prix_unitaire'] * $item['quantity']]);
        })->toArray();

        $invoice = new Invoice();

        $invoice->bl_code = $request->bl_code;
        $invoice->bc_code = $request->bc_code;

        $invoice->invoice_date = $request->date('invoice_date');
        $invoice->due_date = $request->date('due_date');

        $invoice->admin_notes = $request->admin_notes;
        //$invoice->client_notes = $request->client_notes;
        $invoice->condition_general = $request->condition_general;

        $invoice->price_ht = $totalPrice;
        $invoice->price_total = $this->caluculateTva($totalPrice);
        $invoice->price_tva = $this->calculateOnlyTva($totalPrice);

        $invoice->client_id = $request->client;
        $invoice->ticket_id = $request->ticket;
        $invoice->company_id = $request->company;

        $invoice->status = 'non-paid';

        $invoice->save();

        if ($request->has('estimated') && $request->filled('estimated')) {
            //dd($request->estimated, "ouii");
            $estimate = Estimate::whereUuid($request->estimated)->firstOrFail();

            $estimate->invoice()->associate($invoice)->save();

            $estimate->update(['is_invoiced' => true]);
        }

        $invoice->articles()->createMany($invoicesArticles);

        if (isset($request->tickets) && is_array($request->tickets) && count($request->tickets)) {
            //dd($request->tickets);
            $invoice->tickets()->attach($request->tickets);
        }

        return redirect($invoice->edit_url)->with('success', "La Facture  a éte crée avec success");
    }

    public function edit(Invoice $invoice)
    {

        $invoice->load('articles', 'tickets:id,code,uuid')->loadCount('bill', 'tickets');

        return view('theme.pages.Commercial.Invoice.__edit.index', compact('invoice'));
    }

    public function update(InvoiceUpdateFormRequest $request, Invoice $invoice)
    {

        //dd("UuUu",$request->all());

        $newArticles = $request->getNewArticles()->map(function ($item) {
            return collect($item)
                ->merge(['montant_ht' => $item['prix_unitaire'] * $item['quantity']]);
        })->toArray();

        $totalArticlePrice = collect($newArticles)->map(function ($item) {
            return $item['prix_unitaire'] * $item['quantity'];
        })->sum();

        if ($totalArticlePrice !== $invoice->price_ht && $totalArticlePrice > 0) {
            // dd($totalArticlePrice,$invoice->price_ht);
            $totalPrice = $invoice->price_ht + $totalArticlePrice;
            $invoice->price_ht = $totalPrice;
            $invoice->price_total = $this->caluculateTva($totalPrice);
            $invoice->price_tva = $this->calculateOnlyTva($totalPrice);
        }

        $invoice->bl_code = $request->bl_code;
        $invoice->bc_code = $request->bc_code;

        $invoice->invoice_date = $request->date('invoice_date');
        $invoice->due_date = $request->date('due_date');

        $invoice->admin_notes = $request->admin_notes;
        //$invoice->client_notes = $request->client_notes;
        $invoice->condition_general = $request->condition_general;

        $invoice->save();
        $invoice->articles()->createMany($newArticles);

        if (isset($request->tickets) && is_array($request->tickets) && count($request->tickets)) {
            //dd($request->tickets);
            $invoice->tickets()->sync($request->tickets);
        }

        return redirect($invoice->edit_url)->with('success', "Le Facture a été modifier avec success");
    }

    public function deleteInvoice(Request $request)
    {
        //dd($request->all());
        $request->validate(['invoiceId' => 'required|uuid']);

        $invoice = Invoice::whereUuid($request->invoiceId)->firstOrFail();

        if ($invoice) {

            $invoice->articles()
                ->where('articleable_type', 'App\Models\Finance\Invoice')
                ->where('articleable_id', $invoice->id)
                ->delete();

            $invoice->tickets()->detach();
            $invoice->estimate()->update(['is_invoiced' => false]);
            $invoice->delete();

            return redirect(route('commercial:invoices.index'))->with('success', "La Facture  a éte supprimer avec success");
        }
        return redirect(route('commercial:invoices.index'))->with('success', "erreur . . . ");
    }

    public function deleteArticle(DeleteArticleFormRequest $request)
    {
        $invoice = Invoice::whereUuid($request->invoice)->firstOrFail();
        $article = Article::whereUuid($request->article)->firstOrFail();

        if ($invoice && $article) {

            $totalPrice = $invoice->price_ht;

            $totalArticlePrice = $article->montant_ht;

            $finalPrice = $totalPrice - $totalArticlePrice;

            $article = $invoice->articles()
                ->whereUuid($request->article)
                ->whereId($article->id)
                ->whereArticleableId($invoice->id)
                ->forceDelete();

            if ($article) {
                $invoice->price_ht = $finalPrice;
                $invoice->price_total = $this->caluculateTva($finalPrice);
                $invoice->price_tva = $this->calculateOnlyTva($finalPrice);
                $invoice->save();
            }

            if ($invoice->articles()->count() <= 0) {
                $invoice->price_ht = 0;
                $invoice->price_total = 0;
                $invoice->price_tva = 0;
                $invoice->save();
            }

            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        }
        return response()->json([
            'error' => 'problem detected !'
        ]);
    }
}
