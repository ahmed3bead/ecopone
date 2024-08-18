<?php

namespace App\CouponApp\Modules\CouponReactions\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\CouponReactions\Api\Models\CouponReaction;

class CouponReactionRepository extends BaseRepository
{
    public function __construct(CouponReaction $model)
    {
        parent::__construct($model);
    }
}
