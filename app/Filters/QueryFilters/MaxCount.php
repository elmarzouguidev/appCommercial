<?php

namespace App\Filters\QueryFilters;

class MaxCount extends Filter
{

    protected function applyFilters($builder)
    {
        return $builder->take(request($this->filterName()));
    }
}
