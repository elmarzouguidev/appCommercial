<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Finance\BCommand;
use App\Models\Finance\Estimate;
use App\Models\Finance\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PDFPublicController extends Controller
{


    public function showInvoice(Invoice $invoice)
    {

        $invoice->load('articles', 'company:id,name', 'client:id,entreprise');

        $companyLogo = "data:image/jpg;base64,".base64_encode(file_get_contents(public_path('storage/'.$invoice->company->logo)));

        $pdf = \PDF::loadView('theme.invoices_template.template1.index', compact('invoice', 'companyLogo'));

        $fileName = $invoice->invoice_date->format('d-m-Y') . "-[ {$invoice->client->entreprise} ]-" . 'FACTURE-' . "{$invoice->code}" . '.pdf';

        return $pdf->stream($fileName);
    }

    public function showEstimate(Estimate $estimate)
    {

        $estimate->load('articles', 'company', 'client');

        $companyLogo = "data:image/jpg;base64,".base64_encode(file_get_contents(public_path('storage/'.$estimate->company->logo)));

        $pdf = \PDF::loadView('theme.estimates_template.template1.index', compact('estimate', 'companyLogo'));

        $fileName = $estimate->estimate_date->format('d-m-Y') . "-[ {$estimate->client->entreprise} ]-" . 'DEVIS-' . "{$estimate->code}" . '.pdf';

        return $pdf->stream($fileName);
    }

    public function showBCommand(BCommand $command)
    {
        $command->load('articles', 'company', 'provider');

        $companyLogo = "data:image/jpg;base64,".base64_encode(file_get_contents(public_path('storage/'.$command->company->logo)));

        $pdf = \PDF::loadView('theme.bons_template.template1.index', compact('command', 'companyLogo'));

        $fileName = $command->date_command->format('d-m-Y') . "-[ {$command->provider->entreprise} ]-" . 'BON-COMMAND-' . "{$command->code}" . '.pdf';

        return $pdf->stream($fileName);
    }
}
