<?php

namespace App\CouponApp\Modules\Stores\Api\Models;
use App\CouponApp\Modules\Stores\Web\Models\Store as ParentModel;
use App\Models\Scopes\CountryScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([CountryScope::class])]
class Store extends ParentModel
{
    // Add any additional API-specific methods or overrides here
}
