<?php

namespace App\CouponApp\Modules\Countries\Api\Services;

use App\CouponApp\Modules\Countries\Api\Repositories\CountryRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class CountryService extends BaseService
{

    public function __construct(CountryRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
