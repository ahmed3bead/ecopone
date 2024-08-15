<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Api\Models;
use App\CouponApp\Modules\FavouriteCoupons\Web\Models\FavouriteCoupon as ParentModel;
use App\Models\Scopes\CountryScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([CountryScope::class])]
class FavouriteCoupon extends ParentModel
{
    // Add any additional API-specific methods or overrides here
}
