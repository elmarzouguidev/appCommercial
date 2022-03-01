<?php

namespace App\Http\Livewire\Commercial\Avoir\Create;

use App\Models\Client;
use App\Models\Finance\Invoice;
use Livewire\Component;

class Info extends Component
{
    protected $listeners = [
        'selectedAvoirItem',
    ];

    public $invoices;
    public $company;
    public $client;
    public $avoirNumber;

    public $invoiceCode;
    public $invoicePrefix;


    public function render()
    {
        return view('theme.livewire.commercial.avoir.create.info');
    }

    public function mount()
    {
        $this->avoirNumber = '0000';
        $this->company = null;
        $this->client = null;

        $this->invoiceCode = '00000';
        $this->invoicePrefix = 'AVOIR-';
    }

    public function selectedAvoirItem($item)
    {
        $this->company = Invoice::whereId($item)->first()->company;
        $this->client = Invoice::whereId($item)->first()->client;

        if ($this->company->invoicesAvoir->count() <= 0) {
            $number = $this->company->invoice_avoir_start_number;
        } else {
            $number = ($this->company->invoicesAvoir->max('code') + 1);
        }

        $this->avoirNumber = str_pad($number, 5, 0, STR_PAD_LEFT);

    }
}
