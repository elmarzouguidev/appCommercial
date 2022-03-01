<?php

namespace Database\Seeders;

use App\Models\Finance\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected array $companies = [
        [
            'name' => 'Elmarzougui S.R.A.L',
            'website' => 'https://elmarzougui.net',
            'city' => 'casablanca',
            'addresse' => 'casablanca ain chok sidi massoud',
            'telephone' => '0677512753',
            'email' => 'contact@elmarzougui.net',
            'rc' => '466653',
            'ice' => '002544355000046',
            'cnss' => '2077521',
            'patente' => '72020004',
            'if' => '45888553',

            'prefix_invoice' => 'FCT-',
            'invoice_start_number' => 1,

            'prefix_invoice_avoir' => 'AVOIR-',
            'invoice_avoir_start_number' => 1,

            'prefix_estimate' => 'DEVIS-',
            'estimate_start_number' => 1,

            'prefix_bcommand' => 'BON-',
            'bcommand_start_number' => 1

        ]
    ];

    public function run()
    {
        if (Company::count() <= 0) {

            foreach ($this->companies as $company) {

                Company::create($company);
            }
        }
    }
}
