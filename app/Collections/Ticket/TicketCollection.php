<?php

namespace App\Collections\Ticket;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Collection;

class TicketCollection extends Collection
{

    /**
     * @return TicketCollection
     */
    public function groupByStatus(): TicketCollection
    {

        return $this->groupBy(function ($ticket) {

            if ($ticket->status === Status::EN_COURS_DE_DIAGNOSTIC && $ticket->user_id === auth()->id()) {
                return 'ouvert';
            }
            if ($ticket->status === Status::EN_ATTENTE_DE_DEVIS && $ticket->user_id === auth()->id()) {
                return 'en-attent-de-devis';
            }
            if ($ticket->status === Status::RETOUR_DEVIS_NON_CONFIRME && $ticket->user_id === auth()->id()) {
                return 'annuler';
            }


            if ($ticket->status === Status::A_REPARER && $ticket->user_id === auth()->id()) {
                return 'a-preparer';
            }

            if ($ticket->status === Status::EN_COURS_DE_REPARATION && $ticket->user_id === auth()->id()) {
                return 'encours-de-reparation';
            }
            if ($ticket->status === Status::PRET_A_ETRE_LIVRE && $ticket->user_id === auth()->id()) {
                return 'pret-a-etre-livre';
            }
            return 'normal';
        });
    }

    public function groupByReparEtat(): TicketCollection
    {

        return $this->groupBy(function ($ticket) {

            if ($ticket->status === Status::EN_ATTENTE_DE_DEVIS) {
                return 'en-attent-de-devis';
            }

            if ($ticket->status === Status::EN_ATTENTE_DE_BON_DE_COMMAND) {
                return 'en-attent-de-bc';
            }

            if ($ticket->status === Status::RETOUR_NON_REPARABLE) {
                return 'retour-non-reparable';
            }

            return 'normal';
        });
    }
}
