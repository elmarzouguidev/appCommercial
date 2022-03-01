<?php

namespace App\Http\Controllers\Administration\PermissionRole;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\PermissionRole\PermissionFormRequest;
use App\Http\Requests\Application\PermissionRole\RoleFormRequest;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{

    public function index()
    {

        $roles = Role::paginate(10);

        return view('theme.pages.PermissionRole.Role.index', compact('roles'));
    }

    public function indexPermission()
    {

        $permissions = Permission::paginate(10);

        return view('theme.pages.PermissionRole.Permission.index', compact('permissions'));
    }

    public function createRole(RoleFormRequest $request)
    {
        Role::create(['name' => $request->name, 'guard_name' => $request->guard_name]);

        return redirect()->back()->with('success', "Le role  a éte ajouter  avec success");
    }

    public function createPermission(PermissionFormRequest $request)
    {

        Permission::create(['name' => $request->name, 'guard_name' => $request->guard_name]);

        return redirect()->back()->with('success', "La Permission  a éte ajouter  avec success");
    }

    public function deleteRole(Request $request)
    {

        $request->validate(['roleId' => 'required|integer']);

        $role = Role::findOrFail($request->roleId);

        if ($role) {

            // $role->delete();

            return redirect()->back()->with('success', "Le role  a éte supprimer  avec success");
        }
        return redirect()->back()->with('success', "un problem a été détécter ... ");
    }

    public function deletePermission(Request $request)
    {

        $request->validate(['permissionId' => 'required|integer']);

        $permission = Permission::findOrFail($request->permissionId);

        if ($permission) {

            // $permission->delete();

            return redirect()->back()->with('success', "La Permission  a éte supprimer  avec success");
        }
        return redirect()->back()->with('success', "un problem a été détécter ... ");
    }
}
