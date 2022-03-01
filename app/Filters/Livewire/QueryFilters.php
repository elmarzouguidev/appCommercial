<?php

namespace App\Filters\Livewire;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class QueryFilters extends QueryBuilder
{

    protected $model;

    public function __construct($model, array $filters = [])
    {
        //request()->query->set('filter', $filter);
        $this->model = $model;

        $query = $this->model->getInstance()->query();

        parent::__construct($query, request());

        $this->request->query->set('filter', $filters);
        // $this->request->appends(request()->query());

        $this->allowedFilters([
            'nom', 'ville', 'produit',
            AllowedFilter::scope('from_to'),
            //AllowedFilter::exact('dateCommand', 'created_at'),
        ]);
    }

    public function app()
    {
        return app(get_class($this->model->getInstance()));
    }
}
