<?php

namespace App\Repositories\Provider;

use App\Models\Finance\Provider;
use App\Repositories\AppRepository;

class ProviderRepository extends AppRepository implements ProviderInterface
{

    private $provider;

    private $instance;

    private $options;

    public function __construct(Provider $provider)
    {
        $this->provider = $provider;

        $this->options = config('app-config');
    }

    public function __instance(): Provider
    {
        if (!$this->instance) {
            $this->instance = $this->provider;
        }

        return $this->instance;
    }

    public function Providers()
    {
        if ($this->useCache()) {
            //dd('oui');
            return $this->setCache()->remember('all_providers_cache', $this->timeToLive(), function () {

                return $this->provider->all();
            });
        }
        //dd('nooo');
        return $this->provider->all();
    }

    public function Provider(int $id)
    {
        return $this->provider->find($id);
    }

    public function getProviderByUuid(string $id)
    {
        return $this->provider->whereUuid($id);
    }

    public function getProviderById(int $id)
    {
        return $this->provider->whereId($id);
    }

    public function getFirst()
    {
        return $this->provider->first();
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
