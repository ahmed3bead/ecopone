<?php

namespace App\CouponApp\Modules\SocialMedias\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\SocialMedias\Api\Models\SocialMedia;

class SocialMediaRepository extends BaseRepository
{
    public function __construct(SocialMedia $model)
    {
        parent::__construct($model);
    }
}
