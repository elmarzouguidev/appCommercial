<?php


namespace App\Repositories\Admin;


use App\Models\User;
use App\Repositories\AppRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminRepository extends AppRepository implements AdminInterface
{

    private $admin;

    private $instance;

    private $options;

    public function __construct(User $admin)
    {
        $this->admin = $admin;

        $this->options = config('app-config');
    }

    public function __instance(): User
    {
        if (!$this->instance) {
            $this->instance = $this->admin;
        }

        return $this->instance;
    }


    /**
     * @return Admin[]|Collection|string[]
     */
    public function getAdmins()
    {
        if ($this->useCache()) {
            //dd('oui');
            return $this->setCache()->remember('all_admins_cache', $this->timeToLive(), function () {

                return $this->admin->all();

            });
        }
        //dd('nooo');
        return $this->admin->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getAdmin(int $id)
    {
        return $this->admin->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function addAdmin(array $data)
    {
        return $this->admin->create($data);
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->admin->first();
    }
}
