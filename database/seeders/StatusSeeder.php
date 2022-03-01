<?php

namespace Database\Seeders;

use App\Models\Utilities\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{

    protected array $statuses = [
        'Non traité',
        'En cours de diagnostic',
        'En cours de réparation',
        'Retour non réparable',
        'Retour Devis non Confirmé',
        'Retour livré',
        'En attente de devis',
        'En attente de bon de command',
        'Devis Confirmé',
        'à réparer',
        'Prêt à être livré',
        'Prêt à être Facturé',
        'Livré'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        foreach ($this->statuses as $status) {
            Status::create(['name' => $status, 'slug' => Str::slug($status)]);
        }
    }
}
