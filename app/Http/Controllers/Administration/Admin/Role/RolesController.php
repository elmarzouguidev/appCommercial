<?php

namespace App\Http\Controllers\Administration\Admin\Role;

use App\Http\Controllers\Controller;
use Elmarzougui\Roles\Helpers\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function create()
    {

        $roles = [

            ['name' => 'admin', 'guard_name' => 'admin'],
            ['name' => 'writer', 'guard_name' => 'admin'],
            ['name' => 'editor', 'guard_name' => 'admin'],

        ];

        foreach ($roles as $role) {

            Roles::new()->create($role);
            
        }
    }
}
