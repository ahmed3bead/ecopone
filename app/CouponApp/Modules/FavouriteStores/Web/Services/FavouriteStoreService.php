<?php

namespace App\CouponApp\Modules\FavouriteStores\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\FavouriteStores\Web\Repositories\FavouriteStoreRepository;

class FavouriteStoreService extends BaseService
{
    public function __construct(FavouriteStoreRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
