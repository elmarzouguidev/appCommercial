<?php

namespace App\Http\Controllers\Administration\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Category\CategoryFormRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = app(CategoryInterface::class)->getCategories();
        
        return view('theme.pages.Category.index', compact('categories'));
    }

    public function store(CategoryFormRequest $request)
    {

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back()->with('success', "L'ajoute a éte effectuer avec success");
    }

    public function delete(Request $request)
    {
        $request->validate(['categoryId' => 'required|integer']);

        $category = Category::findOrFail($request->categoryId);

        if ($category) {

            //$category->delete();

            return redirect()->back()->with('success', "La suppression a éte effectuer avec success");
        }

        return redirect()->back()->with('success', "Problem ...");
    }
}
