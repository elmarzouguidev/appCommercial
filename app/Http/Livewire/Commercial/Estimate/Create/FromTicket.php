<?php

namespace App\Http\Livewire\Commercial\Estimate\Create;

use App\Models\Client;
use App\Repositories\Client\ClientInterface;
use App\Repositories\Company\CompanyInterface;
use Livewire\Component;

class FromTicket extends Component
{

    protected $listeners = [
        'selectedCompanyItem',
    ];

    public $companies;
    public $estimateCode;
    public $estimatePrefix;
    public $ticket;


    public function hydrate()
    {
        $this->emit('select2');
    }

    public function render()
    {
        return view('theme.livewire.commercial.estimate.create.from-ticket');
    }

    public function mount()
    {
       // $this->companies = app(CompanyInterface::class)->getCompanies(['id', 'name']); //come from EstimateController

        $this->estimateCode = '00000';

        $this->estimatePrefix = 'DEVIS-';
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
