<?php

namespace App\Http\Controllers\Commercial\Bill;

use App\Constants\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Commercial\Bill\BillFormRequest;
use App\Http\Requests\Commercial\Bill\BillInvoiceFormRequest;
use App\Http\Requests\Commercial\Bill\BillUpdateFormRequest;
use App\Models\Finance\Bill;
use App\Models\Finance\Invoice;
use App\Models\Finance\InvoiceAvoir;
use Illuminate\Http\Request;

class BillController extends Controller
{

    public function index()
    {
        $bills = Bill::with('billable')->get();

        return view('theme.pages.Commercial.Bill.__datatable.index', compact('bills'));
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

    public function addBill(Request $request)
    {

        validator($request->route()->parameters(), [

            'invoice' => ['required', 'uuid']

        ])->validate();

        $invoice = Invoice::whereUuid($request->invoice)->firstOrFail();

        return view('theme.pages.Commercial.Bill.__create.index', compact('invoice'));
    }

    public function addBillAvoir(Request $request)
    {

        validator($request->route()->parameters(), [

            'invoice' => ['required', 'uuid']

        ])->validate();

        $invoice = InvoiceAvoir::whereUuid($request->invoice)->firstOrFail();

        return view('theme.pages.Commercial.Bill.__create_avoir.index', compact('invoice'));
    }

    public function storeBill(BillFormRequest $request, Invoice $invoice)
    {
        //dd($request->all());
        $biller = [
            'bill_date' => $request->date('bill_date'),
            'bill_mode' => $request->bill_mode,
            'reference' => $request->reference,
            'notes' => $request->notes,
            'price_ht' => $invoice->price_ht,
            'price_total' => $invoice->price_total,
            'price_tva' => $invoice->price_tva,
        ];

        $invoice->bill()->create($biller);

        $invoice->update(['status' => Response::INVOICE_PAID, 'is_paid' => true]);

        return redirect()->route('commercial:bills.index');
    }

    public function storeBillAvoir(BillFormRequest $request, InvoiceAvoir $invoice)
    {
        //dd($request->all());
        $biller = [
            'bill_date' => $request->date('bill_date'),
            'bill_mode' => $request->bill_mode,
            'reference' => $request->reference,
            'notes' => $request->notes,
            'price_ht' => $invoice->price_ht,
            'price_total' => $invoice->price_total,
            'price_tva' => $invoice->price_tva,
        ];

        $invoice->bill()->create($biller);

        $invoice->update(['status' => 'paid']);

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
