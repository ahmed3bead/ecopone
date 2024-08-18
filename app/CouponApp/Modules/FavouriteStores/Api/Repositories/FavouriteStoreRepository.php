<?php

namespace App\CouponApp\Modules\FavouriteStores\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\FavouriteStores\Api\Models\FavouriteStore;

class FavouriteStoreRepository extends BaseRepository
{
    public function __construct(FavouriteStore $model)
    {
        parent::__construct($model);
    }
}
