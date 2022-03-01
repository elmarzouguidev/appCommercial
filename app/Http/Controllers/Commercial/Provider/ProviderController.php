<?php

namespace App\Http\Controllers\Commercial\Provider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Commercial\Provider\ProviderFormRequest;
use App\Http\Requests\Commercial\Provider\ProviderUpdateFormRequest;
use App\Models\Finance\Provider;
use App\Repositories\Provider\ProviderInterface;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    public function index()
    {
        $providers = app(ProviderInterface::class)->Providers();

        return view('theme.pages.Commercial.Provider.__datatable.index', compact('providers'));
    }

    public function create()
    {
        return view('theme.pages.Commercial.Provider.__create.index');
    }

    public function store(ProviderFormRequest $request)
    {
        //dd($request->all());
        $provider = new Provider();
        $provider->entreprise = $request->entreprise;
        $provider->contact = $request->contact;
        $provider->telephone = $request->telephone;
        $provider->email = $request->email;
        $provider->addresse = $request->addresse;
        $provider->rc = $request->rc;
        $provider->ice = $request->ice;
        $provider->description = $request->description;

        $provider->save();

        return redirect()->back()->with('success', "L'ajoute a éte effectuer avec success");
    }

    public function edit(Provider $provider)
    {
        return view('theme.pages.Commercial.Provider.__edit.index', compact('provider'));
    }

    public function update(ProviderUpdateFormRequest $request, Provider $provider)
    {

        $provider->entreprise = $request->entreprise;
        $provider->contact = $request->contact;
        $provider->telephone = $request->telephone;
        $provider->email = $request->email;
        $provider->addresse = $request->addresse;
        $provider->rc = $request->rc;
        $provider->ice = $request->ice;
        $provider->description = $request->description;
        $provider->save();

        return redirect()->back()->with('success', "La modification a éte effectuer avec success");
    }

    public function delete(Request $request)
    {
        //dd('Ouiui');

        $request->validate(['providerId' => 'required|uuid']);

        $provider = Provider::whereUuid($request->providerId)->firstOrFail();

        if ($provider) {

            //$provider->delete();

            return redirect()->back()->with('success', "La supprission a été effectué  avec success");
        }
        return redirect()->back()->with('success', "error");
    }
}
