<?php

namespace App\CouponApp\Modules\Occasions\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Occasions\Web\Repositories\OccasionRepository;

class OccasionService extends BaseService
{
    public function __construct(OccasionRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
