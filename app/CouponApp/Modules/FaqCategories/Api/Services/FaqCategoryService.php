<?php

namespace App\CouponApp\Modules\FaqCategories\Api\Services;

use App\CouponApp\Modules\FaqCategories\Api\Repositories\FaqCategoryRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class FaqCategoryService extends BaseService
{

    public function __construct(FaqCategoryRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
