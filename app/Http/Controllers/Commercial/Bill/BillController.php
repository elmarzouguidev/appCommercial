<?php

namespace App\Http\Controllers\Commercial\Bill;

use App\Constants\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Commercial\Bill\BillFormRequest;
use App\Http\Requests\Commercial\Bill\BillInvoiceFormRequest;
use App\Http\Requests\Commercial\Bill\BillStoreFormRequest;
use App\Http\Requests\Commercial\Bill\BillUpdateFormRequest;
use App\Models\Finance\Bill;
use App\Models\Finance\Invoice;
use Illuminate\Http\Request;
use App\Services\Commercial\Taxes\TVACalulator;

class BillController extends Controller
{
    use TVACalulator;

    public function index()
    {
        $bills = Bill::with('billable')->get();

        $invoices = Invoice::select('id', 'uuid', 'code', 'price_total')
            ->doesntHave('bill')
            ->doesntHave('avoir')
            ->get();

        return view('theme.pages.Commercial.Bill.__datatable.index', compact('bills', 'invoices'));
    }

    public function create()
    {
        return view('theme.pages.Commercial.Bill.__create_normal.index');
    }

    public function edit(Bill $bill)
    {
        //$bill->load('invoice');
        return view('theme.pages.Commercial.Bill.__edit.index', compact('bill'));
    }

    public function update(BillUpdateFormRequest $request, Bill $bill)
    {
        $bill->bill_date = $request->date('bill_date');
        $bill->bill_mode = $request->bill_mode;
        $bill->reference = $request->reference;
        $bill->notes = $request->notes;

        $bill->save();

        return redirect()->route('commercial:bills.index');
    }

    public function store(BillStoreFormRequest $request)
    {

        $invoice = Invoice::whereUuid($request->invoice)->firstOrFail();

        $newPrice = (int)$request->price_recu;
        //dd($newPrice === (int)$invoice->price_total);
        $biller = [
            'bill_date' => $request->date('bill_date'),
            'bill_mode' => $request->bill_mode,
            'reference' => $request->reference,
            'notes' => $request->notes,
            'price_total' => $newPrice,
        ];

        $invoice->bill()->create($biller);

        if ($invoice->bill()->count() && $invoice->bill()->sum('price_total') > 0  && $invoice->bill()->sum('price_total') < $invoice->price_total) {
            //dd('Ouii');
            $invoice->update(['status' => Response::INVOICE_PARTIAL]);
        } elseif ($invoice->bill()->count() && $invoice->bill()->sum('price_total') > 0  && $invoice->bill()->sum('price_total') === $invoice->price_total) {
            //dd('Ouiivvvv');
            $invoice->update(['status' => Response::INVOICE_PAID, 'is_paid' => true]);
        }


        return redirect()->route('commercial:bills.index');
    }

    public function storeBill(BillFormRequest $request, Invoice $invoice)
    {
        $newPrice = (int)$request->price_recu;

        // dd($newPrice , (int)$invoice->price_total);

        $biller = [
            'bill_date' => $request->date('bill_date'),
            'bill_mode' => $request->bill_mode,
            'reference' => $request->reference,
            'notes' => $request->notes,
            'price_total' => $newPrice,
        ];


        $invoice->bill()->create($biller);

        if ($invoice->bill()->count() && $invoice->bill()->sum('price_total') > 0  && $invoice->bill()->sum('price_total') < $invoice->price_total) {
            //dd('Ouii');
            $invoice->update(['status' => Response::INVOICE_PARTIAL]);
        } elseif ($invoice->bill()->count() && $invoice->bill()->sum('price_total') > 0  && $invoice->bill()->sum('price_total') === $invoice->price_total) {
            //dd('Ouiivvvv');
            $invoice->update(['status' => Response::INVOICE_PAID, 'is_paid' => true]);
        }

        return redirect()->route('commercial:bills.index');
    }

    public function deleteBill(Request $request)
    {

        $request->validate(['billId' => 'required|uuid']);

        $bill = Bill::whereUuid($request->billId)->firstOrFail();

        $invoice = $bill->billable()->firstOrFail();

        if ($bill && $invoice) {

            $bill->delete();

            $invoice->update(['status' => Response::INVOICE_NON_PAID]);

            return redirect()->back()->with('success', "Le reglement  a éte supprimer avec success");
        }
        return redirect()->back()->with('success', "erreur . . . ");
    }
}
