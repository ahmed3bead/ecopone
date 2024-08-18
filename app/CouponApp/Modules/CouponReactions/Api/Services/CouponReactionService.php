<?php

namespace App\CouponApp\Modules\CouponReactions\Api\Services;

use App\CouponApp\Modules\CouponReactions\Api\Repositories\CouponReactionRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class CouponReactionService extends BaseService
{

    public function __construct(CouponReactionRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
