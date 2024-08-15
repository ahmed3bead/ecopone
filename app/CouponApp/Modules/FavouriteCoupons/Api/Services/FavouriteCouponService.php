<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Api\Services;

use App\CouponApp\Modules\FavouriteCoupons\Api\Repositories\FavouriteCouponRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class FavouriteCouponService extends BaseService
{

    public function __construct(FavouriteCouponRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
