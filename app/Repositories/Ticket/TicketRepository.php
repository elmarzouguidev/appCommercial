<?php


namespace App\Repositories\Ticket;

use App\Models\Ticket;
use App\Repositories\AppRepository;
use Illuminate\Database\Eloquent\Collection;

class TicketRepository extends AppRepository implements TicketInterface
{


    private $ticket;

    private $instance;

    private $options;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;

        $this->options = config('app-config');
    }

    public function __instance(): Ticket
    {
        if (!$this->instance) {
            $this->instance = $this->ticket;
        }

        return $this->instance;
    }


    /**
     * @return Ticket[]|Collection|string[]
     */
    public function getTickets()
    {
        if ($this->useCache()) {
            //dd('oui');
            return $this->setCache()->remember('all_tickets_cache', $this->timeToLive(), function () {

                return $this->ticket->all();
            });
        }
        //dd('nooo');
        return $this->ticket->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getTicket(int $id)
    {
        return $this->ticket->find($id);
    }


    public function getTicketByExternalId(string $id)
    {
        return $this->ticket->whereUuid($id);
    }

    public function getTicketById(int $id)
    {
        return $this->ticket->whereId($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function addTicket(array $data)
    {
        return $this->ticket->create($data);
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->ticket->first();
    }

    public function With(array $with)
    {
        return $this->__instance()->with($with);
    }

    public function Without(array $with)
    {
        return $this->__instance()->without($with);
    }
}
