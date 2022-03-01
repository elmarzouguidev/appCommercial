<?php

namespace App\Http\Controllers\Administration\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index()
    {
        return view('theme.pages.Calendar.index');
    }
}
