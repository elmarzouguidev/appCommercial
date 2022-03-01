<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TechnicienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  [
            'nom' => 'ELouahabi',
            'prenom' => 'Ahmed',
            'telephone' => "0677512756",
            'email' => "ahmed@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123456789@'),
            'remember_token' => Str::random(10),
        ];

        $technicien = User::whereEmail('ahmed@gmail.com')->first();

        if (!$technicien) {

            $newTechnicien =  User::create($user);
            $newTechnicien->assignRole('Technicien');
        } else {

            $technicien->assignRole('Technicien');
        }
    }
}
