<?php

namespace App\Http\Livewire\Commercial\Estimate\Create;

use App\Models\Client;
use Livewire\Component;

class Tickets extends Component
{

    protected $listeners = [
        'selectedClientItem',
    ];

    public $clientTickets;

    public $readyToLoad = false;

    public function loadTickets()
    {
        $this->readyToLoad = true;
    }

    public function hydrate()
    {
        $this->emit('select2');
    }

    public function render()
    {
        return view('theme.livewire.commercial.estimate.create.tickets');
    }

    public function mount()
    {
        $this->clientTickets = [];
    }

    public function selectedClientItem($item)
    {
        $this->readyToLoad ?
            $this->clientTickets = Client::whereId($item)->first()->tickets
            :
            $this->clientTickets = [];

    }
}
