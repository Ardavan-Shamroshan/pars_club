<?php

namespace Modules\Comment\Filters;

use Modules\Admin\Filters\AbstractFilter;

/**
 * In this file, we will define the actual filter class.
 * I am only using a type filter for this example, but you have more than one filter
 * like age, demographics, price, etc.
 */
class CommentFilter extends AbstractFilter
{
    protected $filters = [
        'approved' => ApprovedFilter::class,
        'commentable_id' => PostCommentsFilter::class,
        'seen' => SeenFilter::class,
    ];
}