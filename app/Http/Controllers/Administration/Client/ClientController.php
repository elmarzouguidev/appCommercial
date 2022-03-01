<?php

namespace App\Http\Controllers\Administration\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Client\ClientFormRequest;
use App\Http\Requests\Application\Client\ClientUpdateFormRequest;
use App\Http\Requests\Application\Client\EmailsFormRequest;
use App\Models\Client;
use App\Models\Utilities\Email;
use App\Models\Utilities\Telephone;
use App\Repositories\Client\ClientInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ClientController extends Controller
{

    public function index()
    {
        $clients = app(ClientInterface::class)->__instance()->withCount('tickets')->get();

        return view('theme.pages.Client.__datatable.index', compact('clients'));
    }

    public function create()
    {

        return view('theme.pages.Client.__create.index');
    }

    public function store(ClientFormRequest $request)
    {
        $client = Client::create($request->validated());

        if ($request->hasFile('logo')) {

            $client->addMediaFromRequest('logo')
                ->toMediaCollection('clients-logo');
        }

        $request->whenFilled('category', function ($input) use ($client) {

            $client->update(['category_id' => $input]);
        });

        if ($request->telephones) {

            $telephones = $request->collect('telephones');

            if ($telephones->count() > 1 & is_array($telephones)) {
                $client->telephones()->createMany($telephones);
            }
        }

        return redirect()->back()->with('success', "L'ajoute a éte effectuer avec success");
    }

    public function edit(Client $client)
    {
        $client->load('telephones','emails');

        $categories = app(CategoryInterface::class)->getCategories(['id', 'name']);
        return view('theme.pages.Client.__edit.index', compact('client', 'categories'));
    }

    public function update(ClientUpdateFormRequest $request, $client)
    {
        //dd($request->telephones);
        $client = Client::whereUuid($client)->firstOrFail();

        $client->update($request->validated());

        if ($request->hasFile('photo')) {

            $client->addMediaFromRequest('photo')
                ->toMediaCollection('clients-logo');
        }

        $request->whenFilled('category', function ($input) use ($client) {

            $client->update(['category_id' => $input]);
        });

        if ($request->telephones) {

            $telephones = $request->collect('telephones');

            if ($telephones) {
                $client->telephones()->createMany($telephones);
            }
        }
        return redirect()->back()->with('success', "L' Update a éte effectuer avec success");
    }

    public function addEmails(EmailsFormRequest $request, Client $client)
    {
        if ($request->secend_email) {

            $client->emails()->create(['email' => $request->secend_email]);

            return redirect()->back()->with('success', "L' Update a éte effectuer avec success");

        }
        return redirect()->back()->with('errors', "L' Update a éte effectuer avec success");
    }

    public function show(string $slug)
    {

        $client = app(ClientInterface::class)->getClientByUuid($slug)->withCount('tickets')->firstOrFail();

        return view('theme.pages.Client.__profile.index', compact('client'));
    }

    public function delete(Request $request)
    {
        $request->validate(['clientId' => 'required|uuid']);

        $client = Client::whereUuid($request->clientId)->firstOrFail();

        if ($client) {
            //dd('Oui client');

            // $client->delete();

            return redirect()->back()->with('success', "Le client a été supprimer avec success");
        }
        return redirect()->back()->with('success', "Problem ... !!");

    }

    public function deletePhone(Request $request)
    {

        // dd($request->all());
        $request->validate(['client' => 'required|uuid', 'phone' => 'required|uuid']);

        $client = Client::whereUuid($request->client)->firstOrFail();

        $phone = Telephone::whereUuid($request->phone)->firstOrFail();

        if ($client && $phone) {

            $client->telephones()
                ->whereUuid($request->phone)
                ->where('telephoneable_id', $client->id)
                ->delete();
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        }

        return response()->json([
            'error' => 'problem detected !'
        ]);
    }

    public function deleteEmail(Request $request)
    {

        // dd($request->all());
        $request->validate(['client' => 'required|uuid', 'email' => 'required|uuid']);

        $client = Client::whereUuid($request->client)->firstOrFail();

        $email = Email::whereUuid($request->email)->firstOrFail();

        if ($client && $email) {
             //dd("Yes delete it");
            $client->emails()
                ->whereUuid($request->email)
                ->where('emailable_id', $client->id)
                ->delete();
            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        }

        return response()->json([
            'error' => 'problem detected !'
        ]);
    }
}
