<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\FavouriteCoupons\Api\Models\FavouriteCoupon;

class FavouriteCouponRepository extends BaseRepository
{
    public function __construct(FavouriteCoupon $model)
    {
        parent::__construct($model);
    }
}
