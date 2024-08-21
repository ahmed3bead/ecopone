<?php

namespace App\CouponApp\Modules\Customers\Web\Models;

use App\CouponApp\BaseCode\Models\BaseAuthModel;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use App\CouponApp\Modules\CouponReactions\Web\Models\CouponReaction;
use App\CouponApp\Modules\FavouriteCoupons\Web\Models\FavouriteCoupon;
use App\CouponApp\Modules\FavouriteStores\Web\Models\FavouriteStore;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\QueryBuilder\AllowedFilter;

class Customer extends BaseAuthModel
{
    protected $appends = [];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'mobile',
        'country_id',
        'remember_token',
        'logo',
        'gender',
        'birthdate'
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

    public function favouriteCoupons()
    {
        return $this->hasMany(FavouriteCoupon::class);
    } public function favouriteStore()
    {
        return $this->hasMany(FavouriteStore::class);
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
