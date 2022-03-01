<?php

namespace App\Http\Controllers\API\V1\Application;

use App\Http\Controllers\Controller;
use App\Http\Resources\Application\Client\ClientResource;
use App\Models\Client;

class ClientController extends Controller
{
    
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            [
                'payload' =>  ClientResource::collection(Client::all()),
                '_response' => ['msg' => 'successfully Brand']
            ],
            200
        );
    }
}
