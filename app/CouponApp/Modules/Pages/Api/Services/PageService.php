<?php

namespace App\CouponApp\Modules\Pages\Api\Services;

use App\CouponApp\Modules\Pages\Api\Repositories\PageRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class PageService extends BaseService
{

    public function __construct(PageRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
