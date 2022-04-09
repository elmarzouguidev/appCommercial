<?php

namespace App\Http\Controllers\Commercial\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        
        $categories = Category::all();

        return view('theme.pages.Catalog.Category.__datatable.index', compact('categories'));
    }
}
