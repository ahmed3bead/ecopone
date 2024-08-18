<?php

namespace App\CouponApp\Modules\Countries\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Countries\Api\Models\Country;

class CountryRepository extends BaseRepository
{
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}
