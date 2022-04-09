<?php

namespace App\Http\Controllers\Commercial\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Product\ProductFormRequest;
use App\Models\Catalog\Brand;
use App\Models\Catalog\Category;
use App\Models\Catalog\Color;
use App\Models\Catalog\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::with('media')->get();

        return view('theme.pages.Catalog.Product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();

        $brands = Brand::select(['id', 'name'])->get();

        $colors = Color::select(['id', 'name'])->get();

        return view('theme.pages.Catalog.Product.create.index', compact('brands', 'categories', 'colors'));
    }

    public function store(ProductFormRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->reference = $request->reference;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->description = $request->description;
        $product->brand()->associate($request->brand);
        $product->category()->associate($request->category);

        $product->colors()->attach($request->colors);

        $product->save();

        if ($request->hasFile('photo')) {

            $product->addMediaFromRequest('photo')
                ->toMediaCollection('products_images');
        }

        return redirect()->back()->with('success', "Le produit a été ajouter avec success");
    }
}
