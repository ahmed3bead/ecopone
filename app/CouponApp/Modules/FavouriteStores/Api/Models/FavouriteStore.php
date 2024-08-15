<?php

namespace App\CouponApp\Modules\FavouriteStores\Api\Models;
use App\CouponApp\Modules\FavouriteStores\Web\Models\FavouriteStore as ParentModel;
use App\Models\Scopes\CountryScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([CountryScope::class])]
class FavouriteStore extends ParentModel
{
    // Add any additional API-specific methods or overrides here
}
