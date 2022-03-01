<?php

namespace App\Http\Controllers\Administration\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\Commercial\Document\DocumentFormRequest;
use App\Models\Finance\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //

    public function bl()
    {
        $documents = Document::all();

        //$documents->whereType('bl')->get();
        $documents->all();

        return view('theme.pages.Commercial.Document.__datatable.index', compact('documents'));
    }

    public function bc()
    {
        $documents = Document::all();

        // $documents->whereType('bc')->get();
 

        return view('theme.pages.Commercial.Document.__datatable.index', compact('documents'));
    }

    public function createDoc(DocumentFormRequest $request)
    {

        $doc = new Document();

        $doc->title = $request->title;

        $doc->description = $request->description;

        if ($request->hasFile('logo')) {

            $doc->addMediaFromRequest('logo')
                ->toMediaCollection('documents-files');
        }

        $doc->save();
    }
}
