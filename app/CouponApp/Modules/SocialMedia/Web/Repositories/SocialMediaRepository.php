<?php

namespace App\CouponApp\Modules\SocialMedia\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\SocialMedia\Web\Models\SocialMedia;

class SocialMediaRepository extends BaseRepository
{
    public function __construct(SocialMedia $model)
    {
        parent::__construct($model);
    }
}
