<?php

namespace App\Filters\QueryFilters;

class Sort extends Filter
{

    protected function applyFilters($builder)
    {
        return $builder->orderBy('name', request($this->filterName()));
    }
}
