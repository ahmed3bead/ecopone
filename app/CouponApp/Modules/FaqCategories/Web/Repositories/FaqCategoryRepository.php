<?php

namespace App\CouponApp\Modules\FaqCategories\Web\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\FaqCategories\Web\Models\FaqCategory;

class FaqCategoryRepository extends BaseRepository
{
    public function __construct(FaqCategory $model)
    {
        parent::__construct($model);
    }
}
