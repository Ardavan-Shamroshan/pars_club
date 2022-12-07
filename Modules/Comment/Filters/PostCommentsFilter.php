<?php

namespace Modules\Comment\Filters;

class PostCommentsFilter
{
    public function filter($builder, $value) {
        return $builder->where('commentable_id', $value)->whereNotNull('commentable_id');
    }
}