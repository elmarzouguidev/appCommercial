<?php

namespace App\Http\View\Composers;

use App\Models\Ticket;
use Illuminate\View\View;
use Illuminate\Cache\CacheManager;

class TicketComposer
{

    protected Ticket $ticket;

    protected CacheManager $cache;

    public function __construct(Ticket $ticket, CacheManager $cache)
    {
        $this->ticket = $ticket;

        $this->cache = $cache;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('new_tickets', $this->ticket->newTickets());
        $view->with('new_tickets_diagnostic', $this->ticket->newTicketsDiagnostic());
        if (auth()->user()->hasRole('Reception')) {
            $etat = true;
        } else {
            $etat = false;
        }
        $view->with('tickets_livrable', $this->ticket->ticketsLivrable($etat));

        $view->with('tickets_invoiceable', $this->ticket->ticketsInvoiceable());

        /*$view->with('categoriesMenu', $this->cache->remember('categoriesMenu', $this->timeToLive(), function () {
             return $this->categories->categoryInMenu();
         })); */
    }


    private function timeToLive()
    {

        return \Carbon\Carbon::now()->addDays(30);
    }
}
