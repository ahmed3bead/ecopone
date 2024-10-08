<?php

namespace App\CouponApp\Modules\SocialMedia\Api\Services;

use App\CouponApp\Modules\SocialMedia\Api\Repositories\SocialMediaRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class SocialMediaService extends BaseService
{

    public function __construct(SocialMediaRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
