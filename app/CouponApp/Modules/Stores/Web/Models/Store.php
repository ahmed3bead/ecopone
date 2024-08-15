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

    protected $translatable = ['slug', 'name', 'description'];

    protected $fillable = [
        'name',
        'url',
        'logo',
        'description',
        'slug',
        'country_id',
        'is_active',
    ];

    function getDefaultListingFields()
    {
        return ['id', 'name'];
    }

    protected $casts = [
        'country_id' => 'array', // Casting JSON field to array
        'is_active' => 'boolean',
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
        ];
    }

    protected $appends = ['is_favorite'];

    public function favouriteStores()
    {
        return $this->hasMany(FavouriteStore::class);
    }

    public function getIsFavoriteAttribute()
    {
        $customerId = CustomerAuth()->id();
        return $this->favouriteStores()
            ->where('customer_id', $customerId)
            ->where('country_id', CustomerAuth()->user()->country_id)
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
            ->where('country_id', CustomerAuth()->user()->country_id)
            ->delete();
    }
}
