<?php

namespace App\CouponApp\Modules\FavouriteStores\Api\Services;

use App\CouponApp\Modules\FavouriteStores\Api\Repositories\FavouriteStoreRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class FavouriteStoreService extends BaseService
{

    public function __construct(FavouriteStoreRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
