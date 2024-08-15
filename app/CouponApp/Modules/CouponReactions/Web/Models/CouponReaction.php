<?php

namespace App\CouponApp\Modules\CouponReactions\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use App\CouponApp\Modules\Coupons\Web\Models\Coupon;
use App\CouponApp\Modules\Customers\Web\Models\Customer;
use App\CouponApp\Modules\Stores\Web\Models\Store;
use Spatie\QueryBuilder\AllowedFilter;

class CouponReaction extends BaseModel
{
    protected $fillable = [
        'store_id',
        'coupon_id',
        'customer_id',
        'country_id',
        'reaction_type',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
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
        return ['store', 'coupon', 'customer', 'country'];
    }

    public function getAllowedFilters()
    {
        return [
            AllowedFilter::exact('store_id'),
            AllowedFilter::exact('coupon_id'),
            AllowedFilter::exact('customer_id'),
            AllowedFilter::exact('country_id'),
            AllowedFilter::exact('reaction_type'),
        ];
    }
}
