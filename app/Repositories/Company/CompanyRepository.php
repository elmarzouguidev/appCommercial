<?php


namespace App\Repositories\Company;

use App\Models\Finance\Company as FinanceCompany;
use App\Repositories\AppRepository;

class CompanyRepository extends AppRepository implements CompanyInterface
{

    private $company;

    private $instance;

    public function __construct(FinanceCompany $company)
    {
        $this->company = $company;

    }

    public function __instance(): FinanceCompany
    {
        if (!$this->instance) {
            $this->instance = $this->company;
        }

        return $this->instance;
    }

    public function getCompanies($fields = [])
    {
        if ($this->useCache()) {
            // dd('yes cache');
            return $this->setCache()->remember('all_companies_cache', $this->timeToLive(), function () use ($fields) {

                return $this->company->all($fields);
            });
        }
        //dd('no cache');
        return $this->company->all($fields);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getCompany(int $id)
    {
        return $this->company->find($id);
    }


    public function getCompanyByUuid(string $id)
    {
        return $this->company->whereUuid($id);
    }

    public function getCompanyById(int $id)
    {
        return $this->company->whereId($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function addCompany(array $data)
    {
        return $this->company->create($data);
    }

    public function select(array $fields)
    {
        return $this->company->select($fields);
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->company->first();
    }
}
