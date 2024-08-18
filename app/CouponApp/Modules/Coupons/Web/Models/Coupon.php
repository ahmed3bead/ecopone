<?php

namespace App\CouponApp\Modules\Coupons\Web\Models;

use App\CouponApp\BaseCode\Filters\KeywordSearchFilter;
use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\Categories\Web\Models\Category;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use App\CouponApp\Modules\CouponReactions\Web\Models\CouponReaction;
use App\CouponApp\Modules\FavouriteCoupons\Web\Models\FavouriteCoupon;
use App\CouponApp\Modules\Stores\Web\Models\Store;
use Spatie\QueryBuilder\AllowedFilter;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Builder;

class Coupon extends BaseModel
{


    use Translatable;



    protected $translatable = ['name','description'];
    protected $appends = ['is_favorite','formatted_translations'];
    protected $fillable = [
        'name',
        'country_id',
        'url',
        'logo',
        'description',
        'start_at',
        'end_at',
        'is_active',
        'store_id',
        'is_featured',
        'category_id',
    ];

    function getDefaultListingFields()
    {
        return ['id', 'name'];
    }

    protected $casts = [
        'start_at' => 'date',
        'end_at' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];



    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reactions()
    {
        return $this->hasMany(CouponReaction::class);
    }

    public function likeReactions()
    {
        return $this->reactions()->where(['reaction_type' => 'like']);
    }

    public function dislikeReactions()
    {
        return $this->reactions()->where(['reaction_type' => 'dislike']);
    }

    public function favouriteCoupons()
    {
        return $this->hasMany(FavouriteCoupon::class);
    }

    public function isFavorite()
    {
        $customerId = CustomerAuth()->id();
        return $this->favouriteCoupons()
            ->where('customer_id', $customerId)
            ->where('country_id', app('country_id'))
            ->exists();
    }

    public function addToFavorites()
    {
        $customerId = CustomerAuth()->id();
        return $this->favouriteCoupons()
            ->firstOrCreate([
                'customer_id' => $customerId,
                'coupon_id' => $this->id,
                'store_id' => $this->store_id,
                'country_id' => app('country_id'),
            ]);
    }

    public function removeFromFavorites()
    {
        $customerId = CustomerAuth()->id();
        return $this->favouriteCoupons()
            ->where('customer_id', $customerId)
            ->where('country_id', app('country_id'))
            ->delete();
    }

    public function getAllowedIncludes()
    {
        return ['country', 'reactions', 'translations', 'likeReactionsCount', 'dislikeReactionsCount','store','category'];
    }

    public function getAllowedFilters()
    {
        return [
            AllowedFilter::custom('name',new KeywordSearchFilter(['name'])),
            AllowedFilter::exact('country_id'),
            AllowedFilter::exact('is_featured'),
            AllowedFilter::exact('category_id'),
            AllowedFilter::exact('store_id'),
            AllowedFilter::exact('url'),
            AllowedFilter::exact('logo'),
            AllowedFilter::scope('start_at_from', 'startFrom'),
            AllowedFilter::scope('start_at_to', 'startTo'),
            AllowedFilter::scope('end_at_from', 'endFrom'),
            AllowedFilter::scope('end_at_to', 'endTo'),
            AllowedFilter::exact('is_active'),
        ];
    }

    public function getIsFavoriteAttribute()
    {
        $countryId = request()->get('country_id');
        $customerId = CustomerAuth()->id();
        return $this->favouriteCoupons()
            ->where('customer_id', $customerId)
            ->where('country_id', app('country_id'))
            ->exists();
    }


}
