<?php

namespace App\Http\Controllers\Commercial\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Category\CategoryFormRequest;
use App\Http\Requests\Catalog\Category\CategoryUpdateFormRequest;
use App\Models\Catalog\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {

        $categories = Category::all();

        return view('theme.pages.Catalog.Category.__datatable.index', compact('categories'));
    }

    public function store(CategoryFormRequest $request)
    {

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->back()->with('success', "La catégorie a été crée avec success");
    }

    public function edit(Category $category)
    {
    }

    public function update(CategoryUpdateFormRequest $request, Category $category)
    {

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->back()->with('success', "La catégorie a été modifier avec success");
    }

    public function delete(Request $request)
    {
        $request->validate(['categoryId' => 'required|uuid']);

        $category = Category::whereUuid($request->categoryId)->firstOrFail();

        if ($category) {

            //$category->delete();

            return redirect()->back()->with('success', "La catégorie a été supprimer avec success");
        }

        return redirect()->back()->with('error', "Error !!!");
    }
}
