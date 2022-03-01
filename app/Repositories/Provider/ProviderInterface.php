<?php


namespace App\Repositories\Provider;

interface ProviderInterface
{


    public function Providers();

    public function Provider(int $id);

    public function getProviderByUuid(string $id);

    public function getProviderById(int $id);

    public function getFirst();

    public function With(array $with);

    public function Without(array $with);
}
