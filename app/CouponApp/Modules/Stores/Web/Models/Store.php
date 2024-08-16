<?php

namespace App\CouponApp\Modules\Stores\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use App\CouponApp\Modules\FavouriteStores\Web\Models\FavouriteStore;
use Spatie\QueryBuilder\AllowedFilter;
use TCG\Voyager\Traits\Translatable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends BaseModel
{
    use Translatable;
    use HasSlug;
    protected $appends = ['logo_url','formatted_translations','is_favorite'];

    protected $translatable = ['slug','name', 'description'];

    protected $fillable = [
        'name',
        'url',
        'logo',
        'description',
        'slug',
        'country_id',
        'is_active',
        'is_featured'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

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
