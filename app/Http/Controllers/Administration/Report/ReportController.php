<?php

namespace App\Http\Controllers\Administration\Report;

use App\Domain\Support\SaveModel\SaveModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Report\ReportFormRequest;
use App\Models\Ticket;
use App\Models\Utilities\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{


    public function index()
    {
    }

    public function store(ReportFormRequest $request, $slug)
    {
        //dd($request);

        $data = $request->withoutHoneypot();

        $ticket = Ticket::whereExternalId($slug)->firstOrFail();

        $report = $ticket->reports()->updateOrCreate(
            [

                'ticket_id' => $ticket->id,
                'type' => $data['type'],
            ],
            [
                'content' => $data['content'],
                'type' => $data['type'],
                'technicien_id' => auth('technicien')->user()->id,
            ]
        );

        if ($report) {
            
            $ticket->technicien()->associate(auth('technicien')->user()->id)->save();
            $ticket->update(['etat' => $data['etat'], 'status' => 'ouvert']);
        }

        return redirect()->back()->with('success', "Le rapport a éte crée  avec success");
    }

    public function sendReport(Request $request, $slug)
    {
        $request->validate(['ticketId' => 'required|integer']);

        $ticket = Ticket::whereExternalId($slug)->firstOrFail();

        $request->whenFilled('ticketId', function ($input) use ($ticket) {
            $ticket->update(['status' => 'envoyer']);
        });

        return redirect()->back()->with('success', "Le rapport a éte envoyer  avec success");
    }

    public function sendConfirm(Request $request, $slug)
    {
        //dd('Oui');
        $request->validate([

            'ticketId' => 'required|integer',
            'report' => 'required|integer',
            'response' => 'required|string|in:confirme,annuler'
        ]);

        $ticket = Ticket::whereId($request->ticketId)->firstOrFail();

        $ticket->update(['status' => $request->response]);

        return redirect()->back()->with('success', "Le rapport a éte confirmé  avec success");
    }
}
