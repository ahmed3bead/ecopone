<?php

namespace App\CouponApp\Modules\Stores\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Stores\Web\Repositories\StoreRepository;

class StoreService extends BaseService
{
    public function __construct(StoreRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
