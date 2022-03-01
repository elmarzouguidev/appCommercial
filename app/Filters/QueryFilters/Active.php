<?php

namespace App\Filters\QueryFilters;

class Active extends Filter
{

    protected function applyFilters($builder)
    {
        return $builder->where('active', request($this->filterName()));
    }
}
