<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $permissions = [

        ['name' => 'client.browse', 'guard_name' => 'admin'],
        ['name' => 'client.read', 'guard_name' => 'admin'],
        ['name' => 'client.create', 'guard_name' => 'admin'],
        ['name' => 'client.edit', 'guard_name' => 'admin'],
        ['name' => 'client.delete', 'guard_name' => 'admin'],

        ['name' => 'admin.browse', 'guard_name' => 'admin'],
        ['name' => 'admin.read', 'guard_name' => 'admin'],
        ['name' => 'admin.create', 'guard_name' => 'admin'],
        ['name' => 'admin.edit', 'guard_name' => 'admin'],
        ['name' => 'admin.delete', 'guard_name' => 'admin'],


        ['name' => 'invoices.browse', 'guard_name' => 'admin'],
        ['name' => 'invoices.read', 'guard_name' => 'admin'],
        ['name' => 'invoices.create', 'guard_name' => 'admin'],
        ['name' => 'invoices.edit', 'guard_name' => 'admin'],
        ['name' => 'invoices.delete', 'guard_name' => 'admin'],

        ['name' => 'estimates.browse', 'guard_name' => 'admin'],
        ['name' => 'estimates.read', 'guard_name' => 'admin'],
        ['name' => 'estimates.create', 'guard_name' => 'admin'],
        ['name' => 'estimates.edit', 'guard_name' => 'admin'],
        ['name' => 'estimates.delete', 'guard_name' => 'admin'],

        ['name' => 'bcommandes.browse', 'guard_name' => 'admin'],
        ['name' => 'bcommandes.read', 'guard_name' => 'admin'],
        ['name' => 'bcommandes.create', 'guard_name' => 'admin'],
        ['name' => 'bcommandes.edit', 'guard_name' => 'admin'],
        ['name' => 'bcommandes.delete', 'guard_name' => 'admin'],

        ['name' => 'providers.browse', 'guard_name' => 'admin'],
        ['name' => 'providers.read', 'guard_name' => 'admin'],
        ['name' => 'providers.create', 'guard_name' => 'admin'],
        ['name' => 'providers.edit', 'guard_name' => 'admin'],
        ['name' => 'providers.delete', 'guard_name' => 'admin'],

        ['name' => 'bills.browse', 'guard_name' => 'admin'],
        ['name' => 'bills.read', 'guard_name' => 'admin'],
        ['name' => 'bills.create', 'guard_name' => 'admin'],
        ['name' => 'bills.edit', 'guard_name' => 'admin'],
        ['name' => 'bills.delete', 'guard_name' => 'admin'],

    ];


    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($this->permissions as $permission) {

            Permission::create($permission);
        }

        $permissionsItems = Permission::all();

        $adminRole = Role::whereName('SuperAdmin')->first();

        $adminRole->syncPermissions($permissionsItems);
    }
}
