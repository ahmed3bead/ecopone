<?php

namespace App\CouponApp\Modules\Occasions\Api\Services;

use App\CouponApp\Modules\Occasions\Api\Repositories\OccasionRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class OccasionService extends BaseService
{

    public function __construct(OccasionRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
