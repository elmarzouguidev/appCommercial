<?php

namespace App\Http\Livewire\Commercial\Invoice\Create;

use Livewire\Component;

class Articles extends Component
{

    public $articles = [

        'designation' => null,
        'description' => null,
        'quantity' => null,
        'prix_unitaire' => null,
        'taxe' => null,
        'montant_ht' => null,
    ];

    public function render()
    {
        return view('theme.livewire.commercial.invoice.create.articles');
    }

    public function updateArticles()
    {
        dd($this->articles);
    }

    public function getArticles()
    {
        dd($this->articles);
    }
}
