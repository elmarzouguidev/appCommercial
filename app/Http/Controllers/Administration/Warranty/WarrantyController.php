<?php

namespace App\Http\Controllers\Administration\Warranty;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Warranty\WarrantyFormRequest;
use App\Models\Ticket;
use App\Models\Utilities\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{


    public function index()
    {
        $warranties = Warranty::all();
        $tickets = Ticket::select(['id', 'uuid', 'code'])->whereEtat('reparable')->where('livrable', true)
            ->where('can_invoiced', true)->get();

        return view('theme.pages.Warranty.__datatable.index', compact('warranties', 'tickets'));
    }

    public function create()
    {

    }

    public function store(WarrantyFormRequest $request, Ticket $ticket)
    {

    }
}
