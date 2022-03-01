<?php

namespace App\Http\Controllers\Administration\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Admin\AdminFormRequest;
use App\Http\Requests\Application\Admin\AdminPermissionFormRequest;
use App\Http\Requests\Application\Admin\AdminUpdateFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index()
    {
        $admins = User::with('roles')->get();

        return view('theme.pages.Admin.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('theme.pages.Admin.__create.index',compact('roles'));
    }

    public function store(AdminFormRequest $request)
    {

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->super_admin = $request->super_admin;
        $user->save();

        $user->assignRole($request->role);

        return redirect()->back()->with('success', "L'ajoute a éte effectuer avec success");
    }

    public function edit(User $admin)
    {

        $permissions = Permission::all();
        $roles = Role::all();
        return view('theme.pages.Admin.__profile.index', compact('admin', 'permissions','roles'));
    }

    public function update(AdminUpdateFormRequest $request, $admin)
    {
        //dd($request->all(),"####");

        $admin = User::whereUuid($admin)->firstOrFail();

        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->telephone = $request->telephone;
        $admin->email = $request->email;
        $admin->save();

        $admin->syncRoles($request->role);

        $admin->syncPermissions($request->permissions);

        return redirect()->back()->with('success', "Update  a éte effectuer avec success");
    }

    public function syncPermission(AdminPermissionFormRequest $request, $admin)
    {

        $admin = User::findOrFail($admin);

        $admin->syncPermissions($request->permissions);

        return redirect()->back()->with('success', "Syn permissions   a éte effectuer avec success");
    }

    public function delete(Request $request)
    {

        $admin = User::find($request->adminId);

        if ($admin) {

             $admin->delete();

            return redirect()->back()->with('success', "L' Admin  a éte supprimer  avec success");
        }
        return redirect()->back()->with('success', "un problem a été détécter ... ");
    }
}
