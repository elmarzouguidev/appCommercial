<?php

namespace App\Http\Controllers\Administration\Ticket;

use App\Constants\Status;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientInterface;
use App\Repositories\Ticket\TicketInterface;
use Spatie\MediaLibrary\Support\MediaStream;
use App\Http\Requests\Application\Ticket\TicketFormRequest;
use App\Http\Requests\Application\Ticket\TicketUpdateFormRequest;
use App\Http\Requests\Application\Ticket\TicketAttachementsFormRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TicketController extends Controller
{

    public function index(Request $request)
    {
        if (request()->has('appFilter') && request()->filled('appFilter')) {
            $tickets = QueryBuilder::for(app(TicketInterface::class)->__instance())
                ->allowedFilters([
                    'etat', 'status', 'unique_code',
                    AllowedFilter::exact('etat')
                    //AllowedFilter::exact('GetCategory', 'filters_category'),
                    //AllowedFilter::scope('GetCategory', 'filters_category'),
                    // AllowedFilter::scope('GetColor', 'filters_color'),

                ])
                ->with(['client:id,entreprise', 'technicien:id,nom,prenom'])
                ->withCount('technicien')
                ->get()
                ->appends(request()->query());
            //->get();
        } else {
            $tickets = app(TicketInterface::class)->__instance()
                ->with(['client:id,entreprise', 'technicien:id,nom,prenom'])
                ->latest('created_at')
                //->getQuery()
                ->get();
        }

        return view('theme.pages.Ticket.index', compact('tickets'));
    }

    public function create()
    {
        $clients = app(ClientInterface::class)->select(['id', 'entreprise'])->get();

        return view('theme.pages.Ticket.__create.index', compact('clients'));
    }

    public function store(TicketFormRequest $request)
    {

        $ticket = Ticket::create($request->validated());

        if ($request->hasFile('photo')) {
            $ticket->addMediaFromRequest('photo')->toMediaCollection('tickets-images');
        }

        $request->whenFilled('client', function ($input) use ($ticket) {
            $ticket->client()->associate($input)->save();
        });

        $ticket->statuses()->attach(
            Status::NON_TRAITE,
            [
                'user_id' => auth()->id(),
                'start_at' => now(),
                'description' => __('status.history.' . Status::NON_TRAITE, ['user' => auth()->user()->full_name])
            ]);

        return redirect($ticket->edit)->with('success', "L'ajoute a éte effectuer avec success");
    }

    public function show(Ticket $ticket)
    {
        $ticket->load(['media' => function ($q) {
            $q->take(5);
        }, 'technicien:id,nom,prenom', 'client:id,entreprise', 'statuses']);
        $ticket->load('delivery')->loadCount('delivery');

        //dd($ticket->statuses()->first()->name);
        return view('theme.pages.Ticket.__single_v2.index', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('theme.pages.Ticket.__edit.index', compact('ticket'));
    }

    public function update(TicketUpdateFormRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        return redirect($ticket->edit)->with('success', "La modification a éte effectuer avec success");
    }

    public function attachements(TicketAttachementsFormRequest $request, Ticket $ticket)
    {

        foreach ($request->file('photos') as $image) {
            $ticket->addMedia($image)->toMediaCollection('tickets-images');
        }

        return redirect()->back()->with('success', "Les fichiers sont attaché avec success");
    }

    public function downloadFiles(Request $request)
    {
        $request->validate(['ticket' => 'required|uuid']);
        $ticket = Ticket::whereUuid($request->ticket)->firstOrFail();
        $downloads = $ticket->getMedia('tickets-images');

        // Download the files associated with the media in a streamed way.
        // No prob if your files are very large.
        $fileName = "ticket-" . Str::slug($ticket->article) . "-files.zip";
        return MediaStream::create($fileName)->addMedia($downloads);
    }


    public function delete(Request $request)
    {
        $request->validate(['ticket' => 'required|uuid']);

        $ticket = Ticket::whereUuid($request->ticket)->firstOrFail();

        if ($ticket) {
            $ticket->delete();
        }
        return redirect()->back()->with('success', "La supprission a été effectué  avec success");
    }


    public function media(Ticket $ticket)
    {
        $ticket->loadCount('media');

        return view('theme.pages.Ticket.__media.index', compact('ticket'));
    }

    public function deleteMedia(Request $request, Ticket $ticket)
    {
        $request->validate(['mediaId' => 'required|integer']);

        if ($ticket) {

            $ticket->deleteMedia($request->mediaId);

            return redirect()->back()->with('success', "La supprission a été effectué  avec success");
        }
        return redirect()->back()->with('success', "La supprission Probleùm");

        //$toDeleteIds = $request->mediaId;
        /*if(count($toDeleteIds)) {
                $mediaTodelete = Media::whereIn('id', $toDeleteIds)->delete();
        }*/
    }

    public function historical(Ticket $ticket)
    {

        return view('theme.pages.Ticket.__historical.index', compact('ticket'));
    }
}
