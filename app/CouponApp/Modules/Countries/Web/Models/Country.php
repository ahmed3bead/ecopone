<?php

namespace App\CouponApp\Modules\Countries\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use Spatie\QueryBuilder\AllowedFilter;
use App\CouponApp\BaseCode\Translatable;

class Country extends BaseModel
{
    use Translatable;
    protected $appends = ['formatted_translations'];

    protected $translatable = ['name','code'];

    protected $fillable = [
        'name',
        'code',
        'is_active',
        'logo',
    ];

    function getDefaultListingFields()
    {
        return ['id','name'];
    }


    public function getAllowedIncludes()
    {
        return array_merge(['translations'],parent::getAllowedIncludes()); // TODO: Change the autogenerated stub
    }


    public function getAllowedFilters()
    {
        return [
            AllowedFilter::exact('name'),
            AllowedFilter::exact('code'),
            AllowedFilter::exact('is_active'),
        ];
    }
}
