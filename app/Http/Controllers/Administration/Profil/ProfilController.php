<?php

namespace App\Http\Controllers\Administration\Profil;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Profile\ProfileUpdateFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{

    public function index()
    {
        $user = auth(\ticketApp::activeGuard())->user();

        return view('theme.pages.Profile.index', compact('user'));
    }

    public function settings()
    {
        $user = auth(\ticketApp::activeGuard())->user();

        return view('theme.pages.Profile.settings.index', compact('user'));
    }

    public function update(ProfileUpdateFormRequest $request)
    {
        // dd($request->all());
        $user = auth(\ticketApp::activeGuard())->user();

        if ($user) {
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->telephone = $request->telephone;
            if (
                $request->has(['oldpassword', 'new_password', 'new_confirm_password']) &&
                $request->filled(['oldpassword', 'new_password', 'new_confirm_password'])
            ) {

                $user->password = Hash::make($request->new_password);
            }
            $user->save();

            return back()->with('success', 'Profile Updated');
        }

        return back()->with('success', 'Profile Not Updated');
    }
}
