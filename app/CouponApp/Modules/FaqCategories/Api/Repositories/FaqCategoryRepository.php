<?php

namespace App\CouponApp\Modules\FaqCategories\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\FaqCategories\Api\Models\FaqCategory;

class FaqCategoryRepository extends BaseRepository
{
    public function __construct(FaqCategory $model)
    {
        parent::__construct($model);
    }
}
