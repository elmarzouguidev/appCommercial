<?php


namespace App\Repositories\Client;

use App\Models\Client;
use App\Repositories\AppRepository;
use Illuminate\Database\Eloquent\Collection;

class ClientRepository extends AppRepository implements ClientInterface
{


    private $client;

    private $instance;

    private $options;

    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->options = config('app-config');
    }

    public function __instance(): Client
    {
        if (!$this->instance) {
            $this->instance = $this->client;
        }

        return $this->instance;
    }


    /**
     * @return Client[]|Collection|string[]
     */
    public function getClients($fields = [])
    {
        if ($this->useCache()) {
           // dd('yes cache');
            return $this->setCache()->remember('all_clients_cache', $this->timeToLive(), function () use ($fields) {

                return $this->client->all($fields);
            });
        }
        //dd('no cache');
        return $this->client->all($fields);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getClient(int $id)
    {
        return $this->client->find($id);
    }


    public function getClientByUuid(string $uuid)
    {
        return $this->client->whereUuid($uuid);
    }

    public function getClientById(int $id)
    {
        return $this->client->whereId($id);
    }
    
    public function select(array $fields)
    {
        return $this->client->select($fields);
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->client->first();
    }
}
