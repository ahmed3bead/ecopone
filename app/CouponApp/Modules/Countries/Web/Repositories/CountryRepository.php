<?php

namespace App\CouponApp\Modules\Countries\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Countries\Web\Models\Country;

class CountryRepository extends BaseRepository
{
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}
