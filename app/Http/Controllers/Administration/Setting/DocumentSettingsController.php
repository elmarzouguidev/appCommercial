<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Document\DocumentRequest;
use App\Settings\DocumentSettings;
use Illuminate\Http\Request;

class DocumentSettingsController extends Controller
{
    public function show(DocumentSettings $settings)
    {

        return view('theme.pages.Setting.index', [
            'invoice_prefix' => $settings->invoice_prefix,
            'invoice_start' => $settings->invoice_start,

            'invoice_avoir_prefix' => $settings->invoice_avoir_prefix,
            'invoice_avoir_start' => $settings->invoice_avoir_start,

            'estimate_prefix' => $settings->estimate_prefix,
            'estimate_start' => $settings->estimate_start,

            'bc_prefix' => $settings->bc_prefix,
            'bc_start' => $settings->bc_start,
        ]);
    }

    public function update(
        DocumentRequest $request,
        DocumentSettings $settings
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
