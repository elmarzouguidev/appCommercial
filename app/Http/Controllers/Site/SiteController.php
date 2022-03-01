<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Pipelines\RemoveBadWords;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class SiteController extends Controller
{

    public function index()
    {
        $posts = app(Pipeline::class)
            ->send(Category::query())
            ->through([
                \App\Filters\Models\Active::class,
                \App\Filters\Models\Sort::class
            ])
            ->thenReturn()
            ->get();

        return view('demo', compact('posts'));
    }

    public function create(Request $request)
    {
        $pipes = [
            RemoveBadWords::class
        ];

        $category = app(Pipeline::class)
            ->send($request->content)
            ->through($pipes)
            ->then(function ($content) {
                return Category::create(['name' => $content]);
            });
        // return any type of response
    }

    public function tow()
    {
        $posts = Category::allCategories();

        return view('form-1', compact('posts'));
    }
}
