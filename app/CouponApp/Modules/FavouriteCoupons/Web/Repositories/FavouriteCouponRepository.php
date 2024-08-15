<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\FavouriteCoupons\Web\Models\FavouriteCoupon;

class FavouriteCouponRepository extends BaseRepository
{
    public function __construct(FavouriteCoupon $model)
    {
        parent::__construct($model);
    }
}
