<?php

namespace App\Http\Controllers\Commercial\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Brand\BrandFormRequest;
use App\Http\Requests\Catalog\Brand\BrandUpdateFormRequest;
use App\Models\Catalog\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();

        return view('theme.pages.Catalog.Brand.__datatable.index', compact('brands'));
    }


    public function store(BrandFormRequest $request)
    {

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        return redirect()->back()->with('success', "La marque a été crée avec success");
    }

    public function edit(Brand $brand)
    {
    }

    public function update(BrandUpdateFormRequest $request, Brand $brand)
    {

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        return redirect()->back()->with('success', "La marque a été modifier avec success");
    }

    public function delete(Request $request)
    {
        $request->validate(['brandId' => 'required|uuid']);

        $brand = Brand::whereUuid($request->brandId)->firstOrFail();

        if ($brand) {

            //$brand->delete();

            return redirect()->back()->with('success', "La marque a été supprimer avec success");
        }

        return redirect()->back()->with('error', "Error !!!");
    }
}
