<?php

namespace App\Http\Controllers\Sheet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sheet\SheetFormRequest;
use App\Http\Requests\Sheet\SheetTableRequest;
use App\Models\Sheet\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SheetController extends Controller
{
    public function index()
    {
        $sheets = Sheet::all();

        return view('theme.pages.Sheet.index', compact('sheets'));
    }

    public function create(SheetFormRequest $request)
    {
        $sheet = Sheet::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'content' => [[]]
        ]);

        return redirect(route('sheet:view', ['sheet' => $sheet]));
    }

    public function view(Sheet $sheet)
    {
        return view('theme.pages.Sheet.__view.spreadsheet', ['sheet' => $sheet]);
    }

    public function update(SheetTableRequest $request, Sheet $sheet)
    {
        // dd($request->all());
        $sheet->update(['content' => $request->content ?? [[]]]);
        return response()->json(['sheet' => $sheet]);
    }
}
