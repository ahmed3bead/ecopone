<?php

namespace App\CouponApp\Modules\Customers\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Customers\Web\Repositories\CustomerRepository;

class CustomerService extends BaseService
{
    public function __construct(CustomerRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
