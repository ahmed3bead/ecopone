<?php

namespace App\CouponApp\Modules\CouponReactions\Api\Models;
use App\CouponApp\Modules\CouponReactions\Web\Models\CouponReaction as ParentModel;
use App\Models\Scopes\CountryScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([CountryScope::class])]
class CouponReaction extends ParentModel
{
    // Add any additional API-specific methods or overrides here
}
