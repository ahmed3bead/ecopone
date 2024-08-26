<?php

namespace App\CouponApp\Modules\Pages\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Pages\Web\Repositories\PageRepository;

class PageService extends BaseService
{
    public function __construct(PageRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
