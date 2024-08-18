<?php

namespace App\CouponApp\Modules\Customers\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Customers\Web\Models\Customer;

class CustomerRepository extends BaseRepository
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}
