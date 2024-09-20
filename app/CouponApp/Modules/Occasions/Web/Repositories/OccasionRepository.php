<?php

namespace App\CouponApp\Modules\Occasions\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Occasions\Web\Models\Occasion;

class OccasionRepository extends BaseRepository
{
    public function __construct(Occasion $model)
    {
        parent::__construct($model);
    }
}
