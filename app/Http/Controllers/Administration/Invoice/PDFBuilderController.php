<?php

namespace App\Http\Controllers\Administration\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Finance\Invoice;
use App\Models\Finance\InvoiceAvoir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PDFBuilderController extends Controller
{


    public function build(Invoice $invoice)
    {

        $invoice->load('articles', 'company', 'client');

        $companyLogo = "data:image/jpg;base64,".base64_encode(file_get_contents(public_path('storage/'.$invoice->company->logo)));

        $pdf = \PDF::loadView('theme.invoices_template.template1.index', compact('invoice', 'companyLogo'));

        $fileName = $invoice->invoice_date->format('d-m-Y') . "-[ {$invoice->client->entreprise} ]-" . 'FACTURE-' . "{$invoice->code}" . '.pdf';

        return $pdf->stream($fileName);
    }

    public function buildAvoir(InvoiceAvoir $invoice)
    {

        $invoice->load('articles', 'company', 'client');

        $companyLogo = "data:image/jpg;base64,".base64_encode(file_get_contents(public_path('storage/'.$invoice->company->logo)));

        $pdf = \PDF::loadView('theme.invoices_template.avoirs.index', compact('invoice', 'companyLogo'));

        $fileName = $invoice->invoice_date->format('d-m-Y') . "-[ {$invoice->client->entreprise} ]-" . 'FACTURE-AVOIR-' . "{$invoice->code}" . '.pdf';

        return $pdf->stream($fileName);
    }
}
