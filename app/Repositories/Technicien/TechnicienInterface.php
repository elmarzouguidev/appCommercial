<?php


namespace App\Repositories\Technicien;

interface TechnicienInterface
{

    public function getTechniciens();

    public function getTechnicien();

    public function addTechnicien(array $data);

    public function getFirst();
}
