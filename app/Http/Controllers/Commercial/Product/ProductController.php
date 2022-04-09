<?php

namespace App\Http\Controllers\Commercial\Product;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::all();

        return view('theme.pages.Catalog.Product.index', compact('products'));
    }

    public function create()
    {
        return view('theme.pages.Catalog.Product.create.index');
    }
}
