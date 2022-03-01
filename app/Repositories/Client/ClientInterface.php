<?php


namespace App\Repositories\Client;

interface ClientInterface
{


    public function getClients($fields = []);

    public function getClient(int $id);

    public function getClientByUuid(string $uuid);

    public function getClientById(int $id);

    public function select(array $fields);

    public function getFirst();
}
