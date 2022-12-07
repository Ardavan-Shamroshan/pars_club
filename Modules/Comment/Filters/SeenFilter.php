<?php

namespace Modules\Comment\Filters;

class SeenFilter
{
    public function filter($builder, $value) {
        return $builder->where('seen', $value);
    }
}