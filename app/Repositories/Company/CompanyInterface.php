<?php


namespace App\Repositories\Company;

interface CompanyInterface
{


    public function getCompanies($fields = []);

    public function getCompany(int $id);

    public function getCompanyByUuid(string $id);

    public function getCompanyById(int $id);

    public function addCompany(array $data);

    public function select(array $fields);

    public function getFirst();
}
