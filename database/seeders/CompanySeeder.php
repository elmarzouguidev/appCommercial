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
            'name' => 'casamaintenance S.R.A.L',
            'website' => 'https://casamaintenance.ma',
            'city' => 'casablanca',
            'addresse' => '178 si4 zone industrie ouled saleh, Bouskoura',
            'telephone' => '05223-34943',
            'email' => 'contact@casamaintenance.ma',
            'rc' => '466653',
            'ice' => '002544355000046',
            'cnss' => '2077521',
            'patente' => '72020004',
            'if' => '45888553',

            'prefix_invoice' => 'FCT-CASA-',
            'invoice_start_number' => 188,

            'prefix_invoice_avoir' => 'AVOIR-CASA-',
            'invoice_avoir_start_number' => 33,

            'prefix_estimate' => 'DEVIS-CASA-',
            'estimate_start_number' => 112,

            'prefix_bcommand' => 'BON-',
            'bcommand_start_number' => 19

        ],
        [
            'name' => 'industronics unlimited',
            'website' => 'https://industronicsunlimited.ma',
            'city' => 'casablanca',
            'addresse' => '178 si4 zone industrie ouled saleh, Bouskoura',
            'telephone' => '05223-34940',
            'email' => 'industronicsunlimited@gmail.com',
            'rc' => '4311201',
            'ice' => '000191639000018',
            'cnss' => '41111',
            'patente' => '72020',
            'if' => '45888',

            'prefix_invoice' => 'FCT-INDU-',
            'invoice_start_number' => 523,

            'prefix_invoice_avoir' => 'AVOIR-INDU-',
            'invoice_avoir_start_number' => 13,

            'prefix_estimate' => 'DEVIS-INDU-',
            'estimate_start_number' => 12,

            'prefix_bcommand' => 'BON-',
            'bcommand_start_number' => 190
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
