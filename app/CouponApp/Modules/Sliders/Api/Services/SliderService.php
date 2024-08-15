<?php

namespace App\CouponApp\Modules\Sliders\Api\Services;

use App\CouponApp\Modules\Sliders\Api\Repositories\SliderRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class SliderService extends BaseService
{

    public function __construct(SliderRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
