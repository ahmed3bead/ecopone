<?php

namespace App\CouponApp\BaseCode\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class KeywordSearchFilterInTranslations implements Filter
{
    protected array $fields;
    public function __construct($fields = ['title'])
    {
        $this->fields = $fields;
    }

    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where(function ($query) use ($value){
            foreach ($this->fields as $key => $field){
                if($key == 0)
                    $query->whereTranslation($field,'LIKE','%'.strtolower($value . '').'%');
                else
                    $query->whereTranslation($field,'LIKE','%'.strtolower($value . '').'%');
            }
        });
    }
}
