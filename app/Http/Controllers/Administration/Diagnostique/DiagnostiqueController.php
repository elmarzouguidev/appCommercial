<?php

namespace App\Http\Controllers\Administration\Diagnostique;

use App\Constants\Etat;
use App\Constants\Response;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Report\ReportFormRequest;
use App\Http\Requests\Application\Ticket\EstimateResponseRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DiagnostiqueController extends Controller
{

    public function index()
    {

        if (auth()->user()->hasRole('Technicien')) {

            $tickets = auth()->user()->tickets()->with('client:id,entreprise')->get()->groupByStatus();

            return view('theme.pages.Diagnostic.index', compact('tickets'));
        }

        if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin')) {

            $tickets = Ticket::whereIn('status', [Status::EN_ATTENTE_DE_DEVIS, Status::RETOUR_NON_REPARABLE, Status::EN_ATTENTE_DE_BON_DE_COMMAND])
                ->whereIn('etat', [Etat::REPARABLE, Etat::NON_REPARABLE])
                ->whereNotNull('user_id')
                ->with('technicien:id,nom,prenom', 'client:id,entreprise')
                ->get()->groupByReparEtat();
            return view('theme.pages.Diagnostic.__admin.index', compact('tickets'));
        }

    }

    public function diagnose(Ticket $ticket)
    {

        if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin')) {

            $ticket->loadCount('estimate');
        }

        if (auth()->user()->hasRole('Technicien') && $ticket->user_id === null) {
            //dd('Oui  here');
            $ticket->technicien()->associate(auth()->user()->id)->save();

            $ticket->update(['status' => Status::EN_COURS_DE_DIAGNOSTIC]);

            $ticket->statuses()->attach(
                Status::EN_COURS_DE_DIAGNOSTIC,
                [
                    'user_id' => auth()->id(),
                    'start_at' => now(),
                    'description' => __('status.history.' . Status::EN_COURS_DE_DIAGNOSTIC, ['user' => auth()->user()->full_name])
                ]);

        }

        return view('theme.pages.Ticket.__diagnostic.index', compact('ticket'));
    }

    public function storeDiagnose(ReportFormRequest $request, Ticket $ticket)
    {
        //dd($request->all());
        //dd($ticket->diagnoseReports()->count()<= 0);

        if ($ticket->diagnoseReports()->count() <= 0) {

            $ticket->statuses()->attach(
                Status::EN_COURS_DE_DIAGNOSTIC,
                [
                    'user_id' => auth()->id(),
                    'start_at' => now(),
                    'description' => __('status.history.rediger_le_rapport', ['user' => auth()->user()->full_name])
                ]);
        }

        $ticket->reports()->updateOrCreate(
            [
                'ticket_id' => $ticket->id,
                'type' => $request->type,
            ],
            [
                'content' => $request->content,
                'type' => $request->type,
                'user_id' => auth()->id()
            ]
        );

        $ticket->update(['etat' => $request->etat]);

        $message = "Le rapport a éte crée  avec success";

        if ($request->has('sendreport') && $request->filled('sendreport') && $request->sendreport === 'yessendit') {

            //dd((int)$request->etat === Etat::REPARABLE,'DD',$request->etat,'--',Etat::REPARABLE);

            if ((int)$request->etat === Etat::REPARABLE) {

                $ticket->update(['status' => Status::EN_ATTENTE_DE_DEVIS]);

                $ticket->statuses()->attach(
                    Status::EN_ATTENTE_DE_DEVIS,
                    [
                        'user_id' => auth()->id(),
                        'start_at' => now(),
                        'description' => __('status.history.' . Status::EN_ATTENTE_DE_DEVIS, ['user' => auth()->user()->full_name])
                    ]);

                $ticket->diagnoseReports()->update(['close_report' => true]);

                $message = "Le rapport a éte envoyer  avec success";

            }

            if ((int)$request->etat === Etat::NON_REPARABLE) {

                $ticket->update(['etat' => $request->etat, 'status' => Status::RETOUR_NON_REPARABLE]);

                $ticket->statuses()->attach(
                    Status::RETOUR_NON_REPARABLE,
                    [
                        'user_id' => auth()->id(),
                        'start_at' => now(),
                        'description' => __('status.history.' . Status::RETOUR_NON_REPARABLE, ['user' => auth()->user()->full_name])
                    ]);

                $ticket->diagnoseReports()->update(['close_report' => true]);
            }
        }

        return redirect()->back()->with('success', $message);
    }

    public function sendConfirm(EstimateResponseRequest $request, Ticket $ticket)
    {
        //dd('Oui',$request->response);

        if ((int)$request->response === Response::DEVIS_ACCEPTE) {

            $ticket->statuses()->attach(
                Status::A_REPARER,
                [
                    'user_id' => auth()->id(),
                    'start_at' => now(),
                    'description' => __('status.history.' . Status::A_REPARER, ['user' => auth()->user()->full_name])
                ]);

            $ticket->update(['status' => Status::A_REPARER]);
            $ticket->estimate()->update(['status' => Response::DEVIS_ACCEPTE]);

            //$ticket->diagnoseReports()->update(['close_report' => true]);

        } elseif ((int)$request->response === Response::DEVIS_NON_ACCEPTE) {

            $ticket->statuses()->attach(
                Status::RETOUR_DEVIS_NON_CONFIRME,
                [
                    'user_id' => auth()->id(),
                    'start_at' => now(),
                    'description' => __('status.history.' . Status::RETOUR_DEVIS_NON_CONFIRME, ['user' => auth()->user()->full_name])
                ]);

            $ticket->update(['status' => Status::RETOUR_DEVIS_NON_CONFIRME]);
            $ticket->estimate()->update(['status' => Response::DEVIS_NON_ACCEPTE]);

            //$ticket->diagnoseReports()->update(['close_report' => true]);
        }

        return redirect()->back()->with('success', "Le Ticket a éte Traité  avec success");
    }
}
