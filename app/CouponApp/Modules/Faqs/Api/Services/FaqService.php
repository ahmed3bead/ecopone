<?php

namespace App\CouponApp\Modules\Faqs\Api\Services;

use App\CouponApp\Modules\Faqs\Api\Repositories\FaqRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class FaqService extends BaseService
{

    public function __construct(FaqRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
