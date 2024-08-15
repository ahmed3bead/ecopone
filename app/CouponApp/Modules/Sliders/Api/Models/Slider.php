<?php

namespace App\CouponApp\Modules\Sliders\Api\Models;
use App\CouponApp\Modules\Sliders\Web\Models\Slider as ParentModel;
use App\Models\Scopes\CountryScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([CountryScope::class])]
class Slider extends ParentModel
{
    // Add any additional API-specific methods or overrides here
}
