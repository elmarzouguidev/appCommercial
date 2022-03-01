<?php

namespace App\Http\Controllers\Administration\Admin;

use App\Constants\Etat;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Ticket\TicketLivrableFormRequest;
use App\Models\Client;
use App\Models\Finance\Bill;
use App\Models\Finance\Company;
use App\Models\Finance\Estimate;
use App\Models\Finance\Invoice;
use App\Models\Ticket;
use App\Models\Utilities\Delivery;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\QueryBuilderRequest;

class DashboardController extends Controller
{


    public function index()
    {

        //dd(now()->addDays(10)->toDateString());
        $allTicket = Ticket::all(['status', 'etat', 'can_invoiced']);

        $ticketsLast = $allTicket->filter(function ($ticket) {
            return $ticket->user_id === null
                &&
                $ticket->status === Status::NON_TRAITE
                ||
                $ticket->etat === Etat::NON_DIAGNOSTIQUER;
        })->count();

        $ticketsPret = $allTicket->filter(function ($ticket) {
            return $ticket->pret_a_facture === true
                &&
                $ticket->status === Status::PRET_A_ETRE_LIVRE;
        })->count();

        $tickets = $allTicket->filter(function ($ticket) {
            return $ticket->can_invoiced === true;

        })->count();

        $ticketsCount = $allTicket->count();

        if (request()->has('appFilter') && request()->filled('appFilter')) {
            // QueryBuilderRequest::setArrayValueDelimiter('|');

            $invoices = QueryBuilder::for(Invoice::dashboard())
                ->allowedFilters([
                    AllowedFilter::scope('GetPeriod', 'filters_periods'),
                    AllowedFilter::scope('DateBetween', 'filters_date'),
                    AllowedFilter::scope('GetCompany', 'filters_companies'),
                ]);

            $estimates = QueryBuilder::for(Estimate::dashboard())
                ->allowedFilters([
                    AllowedFilter::scope('GetPeriod', 'filters_periods'),
                    AllowedFilter::scope('DateBetween', 'filters_date'),
                    AllowedFilter::scope('GetCompany', 'filters_companies'),
                ]);

            $allInvoices = $invoices->get();

            $allEstimates = $estimates->get();

            $estimatesNotInvoiced = $allEstimates->filter(function ($estimate) {
                return !$estimate->is_invoiced;
            })->count();

            $estimatesExpired = $allEstimates->filter(function ($estimate) {
                return $estimate->due_date->isPast() && !$estimate->is_invoiced;
            })->count();

            $invoicesNotPaid = $allInvoices->filter(function ($invoice) {
                return $invoice->status === 'non-paid';
            })->count();

            $invoicesRetard = $allInvoices->filter(function ($invoice) {
                // dd($invoice->due_date->isPast(),now()->toDateString());
                return $invoice->due_date->isPast() && $invoice->status === 'non-paid';
            })->count();

            $chiffreAff = collect($allInvoices)->filter(function ($item, $key) {
                return $item->status === 'paid';
            })->sum('price_total');

            $chiffreTVA = collect($allInvoices)->filter(function ($item, $key) {
                return $item->status === 'paid';
            })->sum('price_tva');

            $chiffreBills = $allInvoices->filter(function ($invoice) {
                return $invoice->status === 'paid';
            })->sum('price_total');

            $latest = [
                'invoices' => $allInvoices->take(5),
                'estimates' => $allEstimates->take(5),
                'clients' => Client::latest()->select(['id', 'uuid', 'created_at', 'entreprise'])->take(5)->get(),
            ];

            $allInvoices = $allInvoices->count();
            $allEstimates = $allEstimates->count();
        } else {
            $chiffreAff = Invoice::whereMonth('created_at', '=', date('m'))->whereStatus('paid')->sum('price_total');
            $chiffreBills = Bill::whereMonth('created_at', '=', date('m'))->sum('price_total');
            $chiffreTVA = Invoice::whereMonth('created_at', '=', date('m'))->whereStatus('paid')->sum('price_tva');

            $allInvoices = Invoice::count();
            $allEstimates = Estimate::count();

            $invoicesNotPaid = Invoice::whereStatus('non-paid')->count();
            $invoicesRetard = Invoice::whereStatus('non-paid')->whereDate('due_date', '<', now()->toDateString())->count();

            $estimatesExpired = Estimate::where('is_invoiced', false)->whereDate('due_date', '<', now()->toDateString())->count();
            $estimatesNotInvoiced = Estimate::where('is_invoiced', false)->count();

            $latest = [
                'invoices' => Invoice::latest()->select(['id', 'uuid', 'full_number', 'created_at'])->take(5)->get(),
                'estimates' => Estimate::latest()->select(['id', 'uuid', 'full_number', 'created_at'])->take(5)->get(),
                'clients' => Client::latest()->select(['id', 'uuid', 'created_at', 'entreprise'])->take(5)->get(),
            ];
        }

        $companies = Company::select(['id', 'uuid', 'name'])->get();

        return view(
            'theme.pages.Home.index',
            compact(
                'tickets',
                'ticketsCount',
                'ticketsLast',
                'ticketsPret',
                'latest',
                'chiffreAff',
                'chiffreBills',
                'chiffreTVA',
                'invoicesNotPaid',
                'invoicesRetard',
                'allInvoices',
                'companies',
                'allEstimates',
                'estimatesNotInvoiced',
                'estimatesExpired'
            )
        );
    }

    public function ticketLivrable()
    {
        if (auth()->user()->hasRole('Reception')) {
            $tickets = Ticket::whereIn('etat', [Etat::REPARABLE, Etat::NON_REPARABLE])
                ->whereLivrable(true)
                ->whereIn('status', [Status::PRET_A_ETRE_LIVRE, Status::RETOUR_NON_REPARABLE, Status::RETOUR_DEVIS_NON_CONFIRME])
                ->withCount('delivery')
                ->get();
        }

        if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin')) {
            $tickets = Ticket::whereIn('etat', [Etat::REPARABLE, Etat::NON_REPARABLE])
                ->whereIn('status', [Status::PRET_A_ETRE_LIVRE, Status::RETOUR_NON_REPARABLE, Status::RETOUR_DEVIS_NON_CONFIRME])
                //->withCount('delivery')
                ->get();
        }
        return view('theme.pages.Ticket.__pret_livre.__datatable.index', compact('tickets'));
    }

    public function confirmLivrable(TicketLivrableFormRequest $request)
    {
        $ticket = Ticket::whereUuid($request->ticket)->firstOrFail();

        if ($ticket) {
            $delivery = new Delivery();
            $delivery->date_end = $request->date_end;
            $delivery->mode = $request->mode;
            $delivery->info_client = $request->info_client;
            $delivery->notes = $request->notes;
            $delivery->ticket_id = $ticket->id;
            $delivery->user_id = auth()->id();
            $delivery->save();
            $ticket->update(['status' => Status::LIVRE]);
        }
        return redirect()->back()->with('success', 'Ticket  été Livré');
    }

    public function confirmLivrableAdmin(Request $request)
    {
        $request->validate(['ticket' => 'required|uuid']);
        $ticket = Ticket::whereUuid($request->ticket)->firstOrFail();
        if ($ticket) {
            $ticket->update(['livrable' => true]);
        }
        return redirect()->back()->with('success', 'La livraison a été confrimé pour ce ticket');
    }


    public function invoiceable()
    {
        $tickets = Ticket::whereEtat(Etat::REPARABLE)
            ->whereIn('status', [Status::PRET_A_ETRE_LIVRE])
            ->where('can_invoiced', true)
            ->with('client:id,entreprise', 'technicien:id,nom,prenom')
            ->withCount('invoice')
            ->get();

        return view('theme.pages.Ticket.__invoiceable.__datatable.index', compact('tickets'));
    }
}
