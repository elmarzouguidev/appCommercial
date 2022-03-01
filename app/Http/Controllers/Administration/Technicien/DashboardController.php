<?php

namespace App\Http\Controllers\Administration\Technicien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function index()
    {
        return "Hello Tech Home";
    }
}
