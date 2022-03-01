<?php

namespace App\Http\Livewire\Commercial\Avoir\Create;

use App\Models\Finance\Invoice;
use App\Models\Finance\InvoiceAvoir;
use Livewire\Component;

class Info extends Component
{
    protected $listeners = [
        'selectedAvoirItem',
    ];

    public $invoices;

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
        $this->avoirNumber = '00000';

        $this->client = null;

        $this->invoiceCode = '00000';
        $this->invoicePrefix = 'AVOIR-';
    }

    public function selectedAvoirItem($item)
    {

        $this->client = Invoice::whereId($item)->first()->client;

        if (InvoiceAvoir::count() <= 0) {

            $number = getDocument()->invoice_avoir_start;
        } else {

            $number = (InvoiceAvoir::max('code') + 1);
        }

        $this->avoirNumber = str_pad($number, 5, 0, STR_PAD_LEFT);

    }
}
