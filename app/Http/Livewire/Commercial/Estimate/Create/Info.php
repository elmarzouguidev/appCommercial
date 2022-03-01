<?php

namespace App\Http\Livewire\Commercial\Estimate\Create;

use App\Models\Client;
use App\Models\Finance\Estimate;
use App\Repositories\Client\ClientInterface;
use Livewire\Component;

class Info extends Component
{
    protected $listeners = [
    ];


    public $clients;
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
       
        $this->clients = app(ClientInterface::class)->getClients(['id', 'entreprise', 'contact']);

        $this->estimateDetail();
    }

    private function estimateDetail()
    {
        
        if (Estimate::count() <= 0) {

            $number = getDocument()->estimate_start;
        } else {

            $number = (Estimate::max('code') + 1);
        }

        $code = str_pad($number, 5, 0, STR_PAD_LEFT);

        $this->estimateCode = $code;

        $this->estimatePrefix= getDocument()->estimate_prefix ;
    }
}
