<?php

namespace App\CouponApp\Modules\Sliders\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Sliders\Api\Models\Slider;

class SliderRepository extends BaseRepository
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }
}
