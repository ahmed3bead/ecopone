<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\FavouriteCoupons\Web\Repositories\FavouriteCouponRepository;

class FavouriteCouponService extends BaseService
{
    public function __construct(FavouriteCouponRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
