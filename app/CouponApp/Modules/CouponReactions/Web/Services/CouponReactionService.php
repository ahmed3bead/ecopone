<?php

namespace App\CouponApp\Modules\CouponReactions\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\CouponReactions\Web\Repositories\CouponReactionRepository;

class CouponReactionService extends BaseService
{
    public function __construct(CouponReactionRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
