<?php

namespace App\CouponApp\Modules\Sliders\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Sliders\Web\Models\Slider;

class SliderRepository extends BaseRepository
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }
}
