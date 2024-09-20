<?php

namespace App\CouponApp\Modules\Occasions\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Occasions\Api\Models\Occasion;

class OccasionRepository extends BaseRepository
{
    public function __construct(Occasion $model)
    {
        parent::__construct($model);
    }
}
