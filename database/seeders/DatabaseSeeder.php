<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    $this->call(RoleSeeder::class);
    $this->call(PermissionSeeder::class);
    $this->call(AdminSeeder::class);

    \App\Models\Finance\Provider::factory(10)->create();
    \App\Models\Client::factory(20)->create();

  }
}
