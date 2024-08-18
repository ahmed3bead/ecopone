<?php

namespace App\CouponApp\BaseCode\Filters;
use Illuminate\Database\Eloquent\Builder;

class DateRangeFilter
{
    public function __invoke(Builder $query, $value, $filterName)
    {
        // Extract the start_at and end_at dates
        $startAt = $value['start_at'] ?? null;
        $endAt = $value['end_at'] ?? null;

        // Apply the date range filters based on the provided values
        if ($startAt && $endAt) {
            $query->whereBetween($filterName, [$startAt, $endAt]);
        } elseif ($startAt) {
            $query->where($filterName, '>=', $startAt);
        } elseif ($endAt) {
            $query->where($filterName, '<=', $endAt);
        }
    }
}
