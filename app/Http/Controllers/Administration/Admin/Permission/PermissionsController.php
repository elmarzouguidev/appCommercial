<?php

namespace App\Http\Controllers\Administration\Admin\Permission;

use App\Http\Controllers\Controller;
use Elmarzougui\Roles\Helpers\Permissions;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    public function create()
    {

        $existsPermissions = Permissions::new()->pluck('name')->toArray();


        $permissions = [

            ['name' => 'edit articles', 'guard_name' => 'admin'],
            ['name' => 'delete articles', 'guard_name' => 'admin'],
            ['name' => 'add articles', 'guard_name' => 'admin'],
            ['name' => 'update articles', 'guard_name' => 'admin'],

            ['name' => 'add tickets', 'guard_name' => 'admin'],

        ];

        //$data = collect($permissions)->pluck('name')->toArray();

        //  dd($existsPermissions, in_array($data,$existsPermissions), $data);

        foreach ($permissions as $index => $val) {

            if (! in_array($val['name'], $existsPermissions)) {

               // dd($val, $index);

                Permissions::new()->create($val);
            }
    
        }
    }
}
