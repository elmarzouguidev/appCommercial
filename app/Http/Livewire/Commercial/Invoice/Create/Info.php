<?php

namespace App\Http\Livewire\Commercial\Invoice\Create;

use App\Models\Client;
use App\Models\Finance\Company;
use App\Models\Ticket;
use App\Repositories\Client\ClientInterface;
use App\Repositories\Company\CompanyInterface;
use Livewire\Component;

class Info extends Component
{
    protected $listeners = [
        'selectedClientItem',
        'selectedCompanyItem',
    ];

    public function hydrate()
    {
        $this->emit('select2');
    }

    public $companies;

    public $clients;

    public $ticket = null;

    public $tickets;
    public $invoiceCode;
    public $invoicePrefix;

    public function render()
    {
        return view('theme.livewire.commercial.invoice.create.info');
    }

    public function mount()
    {
        $this->companies = app(CompanyInterface::class)->getCompanies(['id', 'name']);

        $this->clients = app(ClientInterface::class)->getClients(['id', 'entreprise', 'contact']);

        $this->tickets = [];

        $this->invoiceCode = '0000';

        $this->invoicePrefix = 'FACTURE-';
    }

    public function selectedClientItem($item)
    {

        if (is_numeric($item)) {
            $this->tickets = Client::whereId($item)->first()->tickets;
            //dd($this->clientTickets,'ff');
        } else {
            $this->tickets = [];
        }

    }

    public function selectedCompanyItem($item)
    {
        if (is_numeric($item)) {

            if ($this->companies[$item - 1]->invoices->count() <= 0) {
                $number = $this->companies[$item - 1]->invoice_start_number;
            } else {
                $number = ($this->companies[$item - 1]->invoices->max('code') + 1);
            }

            $this->invoiceCode = str_pad($number, 5, 0, STR_PAD_LEFT);

            $this->invoicePrefix = $this->companies[$item - 1]->prefix_invoice;
        }
    }
}
