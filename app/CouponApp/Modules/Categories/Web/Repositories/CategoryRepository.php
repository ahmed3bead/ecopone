<?php

namespace App\CouponApp\Modules\Categories\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\Categories\Web\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}
