<?php

namespace App\Http\Livewire\Commercial\Invoice\Create;

use App\Models\Client;
use App\Models\Finance\Invoice;
use App\Repositories\Client\ClientInterface;
use Livewire\Component;

class Info extends Component
{
    protected $listeners = [
        'selectedClientItem',
    ];

    public function hydrate()
    {
        $this->emit('select2');
    }


    public $clients;

    public $invoiceCode;
    public $invoicePrefix;

    public function render()
    {
        return view('theme.livewire.commercial.invoice.create.info');
    }

    public function mount()
    {

        $this->clients = app(ClientInterface::class)->getClients(['id', 'entreprise', 'contact']);

        $this->getInvoiceDetail();

    }

    private function getInvoiceDetail()
    {
        
        if (Invoice::count() <= 0) {

            $number = getDocument()->invoice_start;
        } else {

            $number = (Invoice::max('code') + 1);
        }

        $code = str_pad($number, 5, 0, STR_PAD_LEFT);

        $this->invoiceCode = $code;

        $this->invoicePrefix= getDocument()->invoice_prefix ;
    }

}
