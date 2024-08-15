<?php

namespace App\CouponApp\Modules\Customers\Web\Models;

use App\CouponApp\BaseCode\Models\BaseAuthModel;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use App\CouponApp\Modules\CouponReactions\Web\Models\CouponReaction;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\QueryBuilder\AllowedFilter;

class Customer extends BaseAuthModel
{

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'country_id',
        'remember_token',
        'logo',
    ];
    function getDefaultListingFields()
    {
        return ['id','name'];
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function reactions()
    {
        return $this->hasMany(CouponReaction::class);
    }

    public function getAllowedIncludes()
    {
        return ['country', 'reactions'];
    }

    public function getAllowedFilters()
    {
        return [
            AllowedFilter::exact('name'),
            AllowedFilter::exact('email'),
            AllowedFilter::exact('country_id'),
            AllowedFilter::exact('logo'),
        ];
    }
}
