<?php

namespace App\Http\Livewire\Commercial\Estimate\Create;

use App\Models\Client;
use App\Models\Finance\Company;
use App\Models\Ticket;
use App\Repositories\Client\ClientInterface;
use App\Repositories\Company\CompanyInterface;
use Livewire\Component;

class Info extends Component
{
    protected $listeners = [
        //'selectedClientItem',
        'selectedCompanyItem',
    ];

    public $companies;
    public $clients;
    public $tickets;
    public $estimateCode;
    public $estimatePrefix;


    public function hydrate()
    {
        $this->emit('select2');
    }

    public function render()
    {
        return view('theme.livewire.commercial.estimate.create.info');
    }

    public function mount()
    {
        $this->companies = app(CompanyInterface::class)->getCompanies(['id', 'name']);

        $this->clients = app(ClientInterface::class)->getClients(['id', 'entreprise', 'contact']);

        $this->tickets = [];

        $this->estimateCode = '00000';

        $this->estimatePrefix = 'DEVIS-';
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

            if ($this->companies[$item - 1]->estimates->count() <= 0) {
                $number = $this->companies[$item - 1]->estimate_start_number;
            } else {
                $number = ($this->companies[$item - 1]->estimates->max('code') + 1);
            }

            $this->estimateCode = str_pad($number, 5, 0, STR_PAD_LEFT);

            $this->estimatePrefix = $this->companies[$item - 1]->prefix_estimate;
        }
    }
}
