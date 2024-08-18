<?php

namespace App\CouponApp\Modules\Customers\Api\Services;

use App\CouponApp\Modules\Customers\Api\Repositories\CustomerRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class CustomerService extends BaseService
{

    public function __construct(CustomerRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
