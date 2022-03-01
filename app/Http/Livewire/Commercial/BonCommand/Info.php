<?php

namespace App\Http\Livewire\Commercial\BonCommand;

use App\Models\Finance\BCommand;
use App\Repositories\Company\CompanyInterface;
use App\Repositories\Provider\ProviderInterface;
use Livewire\Component;

class Info extends Component
{
    public $providers;
    
    public $bCommandCode;
    public $bCommandPrefix;

    public function render()
    {
        return view('theme.livewire.commercial.bon-command.info');
    }

    public function mount()
    {

        $this->providers = app(ProviderInterface::class)->Providers();

        $this->getBcDetail();
    }

    public function getBcDetail()
    {
        if (BCommand::count() <= 0) {

            $number = getDocument()->bc_start;
        } else {

            $number = (BCommand::max('code') + 1);
        }

        $this->bCommandCode = str_pad($number, 5, 0, STR_PAD_LEFT);

        $this->bCommandPrefix = getDocument()->bc_prefix;
    }
}
