<?php

namespace App\Repositories\Reception;

use App\Models\Authentification\Reception;
use App\Repositories\AppRepository;

class ReceptionRepository extends AppRepository implements ReceptionInterface
{

    private $model;

    private $instance;

    public function __construct(Reception $reception)
    {
        $this->model = $reception;
    }

    /**
     * @return Reception
     */
    public function __instance(): Reception
    {
        if (!$this->instance) {

            $this->instance = $this->model;
        }

        return $this->instance;
    }

    /**
     * @return mixed
     */
    public function getReceptions()
    {
        if ($this->useCache()) {

            return $this->setCache()->remember('all_Receptions_cache', $this->timeToLive(), function () {

                return $this->model->all();

            });
        }
        return $this->model->all();
    }

    /**
     * @return mixed
     */
    public function getReception()
    {
        // TODO: Implement getTechnicien() method.
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function addReception(array $data)
    {
        // TODO: Implement addTechnicien() method.
    }

    public function getFirst()
    {
        return $this->model->first();
    }
}
