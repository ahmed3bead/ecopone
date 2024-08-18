<?php

namespace App\CouponApp\Modules\FavouriteStores\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use App\CouponApp\Modules\Coupons\Web\Models\Coupon;
use App\CouponApp\Modules\Customers\Web\Models\Customer;
use App\CouponApp\Modules\Stores\Web\Models\Store;
use Spatie\QueryBuilder\AllowedFilter;

class FavouriteStore extends BaseModel
{
    protected $fillable = [
        'country_id',
        'store_id',
        'customer_id',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getAllowedIncludes()
    {
        return ['country', 'store', 'customer'];
    }


    public function getAllowedFilters()
    {
        return [
            AllowedFilter::exact('country_id'),
            AllowedFilter::exact('store_id'),
            AllowedFilter::exact('customer_id'),
        ];
    }
}
