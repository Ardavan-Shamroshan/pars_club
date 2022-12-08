<?php

namespace Modules\Post\Filters;

use App\Filters\AbstractFilter;
use Modules\Post\Filters\StatusFilter;

/**
 * In this file, we will define the actual filter class.
 * I am only using a type filter for this example, but you have more than one filter
 * like age, demographics, price, etc.
 */
class PostFilter extends AbstractFilter
{
    protected $filters = [
        'status' => StatusFilter::class,

    ];
}