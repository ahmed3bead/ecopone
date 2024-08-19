<?php

namespace App\CouponApp\Modules\Faqs\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Faqs\Web\Repositories\FaqRepository;

class FaqService extends BaseService
{
    public function __construct(FaqRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
