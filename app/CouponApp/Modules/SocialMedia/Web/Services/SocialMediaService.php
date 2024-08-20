<?php

namespace App\CouponApp\Modules\SocialMedias\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\SocialMedias\Web\Repositories\SocialMediaRepository;

class SocialMediaService extends BaseService
{
    public function __construct(SocialMediaRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
