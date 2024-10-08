<?php

namespace App\CouponApp\Modules\Stores\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use App\CouponApp\Modules\FavouriteStores\Web\Models\FavouriteStore;
use Spatie\QueryBuilder\AllowedFilter;
use TCG\Voyager\Traits\Translatable;


class Store extends BaseModel
{
    use Translatable;
    protected $appends = ['formatted_translations','is_favorite'];

    protected $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'url',
        'logo',
        'description',
        'country_id',
        'is_active',
        'is_featured'
    ];


    function getDefaultListingFields()
    {
        return ['id', 'name'];
    }

    protected $casts = [
        'country_id' => 'int', // Casting JSON field to array
        'is_active' => 'boolean'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getAllowedIncludes()
    {
        return ['country', 'translations'];
    }

    public function getAllowedFilters()
    {
        return [
            AllowedFilter::exact('name'),
            AllowedFilter::exact('country_id'),
            AllowedFilter::exact('slug'),
            AllowedFilter::exact('is_active'),
            AllowedFilter::exact('is_featured'),
        ];
    }


    public function favouriteStores()
    {
        return $this->hasMany(FavouriteStore::class);
    }

    public function getIsFavoriteAttribute()
    {
        $customerId = CustomerAuth()->id();
        return $this->favouriteStores()
            ->where('customer_id', $customerId)
            ->where('country_id', app('country_id'))
            ->exists();
    }

    public function addToFavorites()
    {
        return CustomerAuth()->id()->addToFavorites();
    }

    public function removeFromFavorites()
    {
        $customerId = CustomerAuth()->id();
        return $this->favouriteStores()
            ->where('customer_id', $customerId)
            ->where('country_id', app('country_id'))
            ->delete();
    }
}
