<?php

namespace App\CouponApp\Modules\Coupons\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Coupons\Web\Repositories\CouponRepository;

class CouponService extends BaseService
{
    public function __construct(CouponRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
