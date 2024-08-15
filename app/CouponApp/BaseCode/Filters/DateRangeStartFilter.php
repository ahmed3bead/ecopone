<?php

namespace App\CouponApp\BaseCode\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class DateRangeStartFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property): Builder
    {
        $field = $property; // Field name can be customized if needed
        return $query->where($field, '>=', $value);
    }
}
