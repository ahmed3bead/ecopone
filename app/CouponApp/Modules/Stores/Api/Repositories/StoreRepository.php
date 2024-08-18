<?php

namespace App\CouponApp\Modules\Stores\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\FavouriteStores\Api\Models\FavouriteStore;
use App\CouponApp\Modules\Stores\Api\Models\Store;

class StoreRepository extends BaseRepository
{
    public function __construct(Store $model)
    {
        parent::__construct($model);
    }

    public function removeFromFavorites($id)
    {
        return $this->find($id)->removeFromFavorites();
    }

    public function addToFavourite($id)
    {
        return $this->find($id)->addToFavorites();
    }
}
