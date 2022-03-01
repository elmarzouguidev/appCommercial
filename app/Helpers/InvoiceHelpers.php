<?php


namespace App\Helpers;

use App\Models\Finance\Estimate;
use App\Models\Finance\Invoice;

trait InvoiceHelpers
{

    public function nextInvoiceNumber()
    {

        return Invoice::max('code') + 1;
    }

    public function nextEstimateNumber()
    {

        return Estimate::max('code') + 1;
    }

    public function invoicePrefix()
    {

        return config('app-config.invoices.prefix');
    }

    public function estimatePrefix()
    {

        return config('app-config.estimates.prefix');
    }

    public function invoiceDueDate($days = null)
    {
        return  now()->addDays(config('app-config.invoices.due_date_after'))->format('Y-m-d');
    }

    public function estimateDueDate($days = null)
    {
        return  now()->addDays(config('app-config.estimates.due_date_after'))->format('Y-m-d');
    }
}
