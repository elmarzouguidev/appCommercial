<?php

namespace App\Http\Controllers\Administration\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{


    public function index()
    {
        return view('theme.pages.Chat.index');
    }
}
