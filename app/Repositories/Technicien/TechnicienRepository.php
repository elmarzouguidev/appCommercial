<?php


namespace App\Repositories\Technicien;


use App\Models\Authentification\Technicien;
use App\Repositories\AppRepository;

class TechnicienRepository extends AppRepository implements TechnicienInterface
{

    private $model;

    private $instance;

    public function __construct(Technicien $technicien)
    {
        $this->model = $technicien;
    }

    /**
     * @return Technicien
     */
    public function __instance(): Technicien
    {
        if (!$this->instance) {

            $this->instance = $this->model;
        }

        return $this->instance;
    }

    /**
     * @return mixed
     */
    public function getTechniciens()
    {
        if ($this->useCache()) {

            return $this->setCache()->remember('all_techniciens_cache', $this->timeToLive(), function () {

                return $this->model->all();

            });
        }
        return $this->model->all();
    }

    /**
     * @return mixed
     */
    public function getTechnicien()
    {
        // TODO: Implement getTechnicien() method.
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function addTechnicien(array $data)
    {
        // TODO: Implement addTechnicien() method.
    }

    public function getFirst()
    {
        return $this->model->first();
    }
}
