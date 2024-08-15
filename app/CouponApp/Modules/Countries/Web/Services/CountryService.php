<?php

namespace App\CouponApp\Modules\Countries\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Countries\Web\Repositories\CountryRepository;

class CountryService extends BaseService
{
    public function __construct(CountryRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
