<?php

namespace App\CouponApp\Modules\Sliders\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Sliders\Web\Repositories\SliderRepository;

class SliderService extends BaseService
{
    public function __construct(SliderRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
