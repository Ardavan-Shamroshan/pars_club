<?php

namespace Modules\Comment\Filters;

/**
 * This ApprovedFilter class is responsible for filtering the data based on the type.
 * We pass the type in the query string, and we get the result according to that.
 */
class ApprovedFilter
{
    public function filter($builder, $value) {
        return $builder->where('approved', $value);
    }
}