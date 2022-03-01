<?php

namespace App\Http\Livewire\Commercial\BonCommand;

use App\Repositories\Company\CompanyInterface;
use App\Repositories\Provider\ProviderInterface;
use Livewire\Component;

class Info extends Component
{
    public $companies;
    public $providers;
    public $bCommandCode;
    public $bCommandPrefix;
    public $selectCompany;

    public function render()
    {
        return view('theme.livewire.commercial.bon-command.info');
    }

    public function mount()
    {
        $this->companies = app(CompanyInterface::class)->getCompanies(['id', 'name']);

        $this->providers = app(ProviderInterface::class)->Providers();

        $this->bCommandCode = '0000';

        $this->bCommandPrefix = 'BONC-';
    }

    public function updatedSelectCompany()
    {
        //dd($this->companies[$this->selectCompany - 1]->invoices->count());
        if (is_numeric($this->selectCompany)) {

            if ($this->companies[$this->selectCompany - 1]->bCommands->count() <= 0) {
                $number = $this->companies[$this->selectCompany- 1]->bcommand_start_number;
            } else {
                $number = ($this->companies[$this->selectCompany - 1]->bCommands->max('code') + 1);
            }

            $this->bCommandCode = str_pad($number, 5, 0, STR_PAD_LEFT);

            $this->bCommandPrefix = $this->companies[$this->selectCompany - 1]->prefix_bcommand;
        }
    }
}
