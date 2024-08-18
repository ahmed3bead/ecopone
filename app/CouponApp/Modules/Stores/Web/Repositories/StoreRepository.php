<?php

namespace App\CouponApp\Modules\Stores\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Stores\Web\Models\Store;

class StoreRepository extends BaseRepository
{
    public function __construct(Store $model)
    {
        parent::__construct($model);
    }
}
