<?php

namespace App\CouponApp\Modules\Coupons\Api\Models;
use App\CouponApp\Modules\Coupons\Web\Models\Coupon as ParentModel;
use App\Models\Scopes\CountryScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([CountryScope::class])]
class Coupon extends ParentModel
{
    // Add any additional API-specific methods or overrides here
}
