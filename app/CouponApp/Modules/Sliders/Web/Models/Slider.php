<?php

namespace App\CouponApp\Modules\Sliders\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use Spatie\QueryBuilder\AllowedFilter;
use TCG\Voyager\Traits\Translatable;

class Slider extends BaseModel
{
    use Translatable;

    protected $translatable = ['name'];

    protected $fillable = [
        'title',
        'image',
        'url',
        'is_active',
        'country_id',
        'start_at',
        'end_at',
    ];

    function getDefaultListingFields()
    {
        return ['id','title'];
    }

    protected $casts = [
        'is_active' => 'boolean',
        'start_at' => 'date',
        'end_at' => 'date',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getAllowedIncludes()
    {
        return ['country','translations'];
    }

    public function getAllowedFilters()
    {
        return [
            AllowedFilter::exact('title'),
            AllowedFilter::exact('is_active'),
            AllowedFilter::exact('country_id'),
            AllowedFilter::scope('start_at_from', 'startFrom'),
            AllowedFilter::scope('start_at_to', 'startTo'),

            AllowedFilter::scope('end_at_from', 'endFrom'),
            AllowedFilter::scope('end_at_to', 'endTo'),
        ];
    }
}
