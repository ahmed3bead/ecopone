<?php

namespace App\CouponApp\Modules\CouponReactions\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\CouponReactions\Web\Models\CouponReaction;

class CouponReactionRepository extends BaseRepository
{
    public function __construct(CouponReaction $model)
    {
        parent::__construct($model);
    }
}
