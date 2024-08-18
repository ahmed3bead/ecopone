<?php

namespace App\CouponApp\Modules\Categories\Api\Services;

use App\CouponApp\Modules\Categories\Api\Repositories\CategoryRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class CategoryService extends BaseService
{

    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
