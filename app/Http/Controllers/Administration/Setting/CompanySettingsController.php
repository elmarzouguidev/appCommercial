<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Company\CompanySettingRequest;
use App\Settings\CompanySettings;
use Illuminate\Http\Request;

class CompanySettingsController extends Controller
{


    public function show(CompanySettings $settings)
    {

        return view('theme.pages.Setting.index', [
            'name' => $settings->name,
            'website' => $settings->website,
            'logo' => $settings->logo,
            'addresse' => $settings->addresse,
            'telephone' => $settings->telephone,
            'email' => $settings->email,
            'rc' => $settings->rc,
            'ice' => $settings->ice,
            'cnss' => $settings->cnss,
            'patente' => $settings->patente,
            'if' => $settings->if,
        ]);
    }

    public function update(
        CompanySettingRequest $request,
        CompanySettings $settings
    ) {
        $settings->name = $request->name;
        $settings->website = $request->website;
        $settings->logo = $request->logo;
        $settings->addresse = $request->addresse;
        $settings->telephone = $request->telephone;
        $settings->email = $request->email;
        $settings->rc = $request->rc;
        $settings->ice = $request->ice;
        $settings->cnss = $request->cnss;
        $settings->patente = $request->patente;
        $settings->if = $request->if;

        $settings->save();

        return redirect()->back()->with('success', "Update a éte effectuer avec success");
    }
}
