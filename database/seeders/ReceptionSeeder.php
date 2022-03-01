<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  [
            'nom' => 'Houari',
            'prenom' => 'khalid',
            'telephone' => "0677512759",
            'email' => "khalid@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123456789@'),
            'remember_token' => Str::random(10),
        ];

        $reception = User::whereEmail('khalid@gmail.com')->first();

        if (!$reception) {

            $newReception =  User::create($user);

            $newReception->assignRole('Reception');
        } else {

            $reception->assignRole('Reception');
        }
    }
}
