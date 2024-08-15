<?php

namespace App\CouponApp\Modules\Stores\Api\Services;

use App\CouponApp\Modules\Stores\Api\Repositories\StoreRepository;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Stores\Api\Requests\StoreUpdateRequest;

class StoreService extends BaseService
{

    public function __construct(StoreRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here

    public function addToFavourite(StoreUpdateRequest $request, $id)
    {
        return $this->response()->setData($this->repository->addToFavourite($id))->setStatusCode(200);
    }

    public function removeFromFavorites($id)
    {
        return $this->response()->setData($this->repository->removeFromFavorites($id))->setStatusCode(204);

    }
}
