<?php


namespace App\Repositories\Reception;

interface ReceptionInterface
{

    public function getReceptions();

    public function getReception();

    public function addReception(array $data);

    public function getFirst();
}
