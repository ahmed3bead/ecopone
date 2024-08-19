<?php

namespace App\CouponApp\Modules\FaqCategories\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\FaqCategories\Web\Repositories\FaqCategoryRepository;

class FaqCategoryService extends BaseService
{
    public function __construct(FaqCategoryRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
