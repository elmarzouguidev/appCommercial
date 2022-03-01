<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class DocumentSettings extends Settings
{
    
    public string $invoice_prefix;
    public string $invoice_start;

    public string $invoice_avoir_prefix;
    public string $invoice_avoir_start;

    public string $estimate_prefix;
    public string $estimate_start;
    
    public string $bc_prefix;
    public string $bc_start;

    public static function group(): string
    {
        return 'document';
    }
}
