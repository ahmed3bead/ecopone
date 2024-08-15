<?php

namespace App\CouponApp\Modules\Coupons\Api\Services;

use App\CouponApp\Modules\Coupons\Api\Repositories\CouponRepository;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Coupons\Api\Requests\CouponUpdateRequest;

class CouponService extends BaseService
{

    public function __construct(CouponRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
    public function addToFavourite(CouponUpdateRequest $request, $id)
    {
        return $this->response()->setData($this->repository->addToFavourite($id))->setStatusCode(200);
    }

    public function addNewReaction(CouponUpdateRequest $request, $id)
    {
        return $this->response()->setData($this->repository->addNewReaction($request->all(), $id))->setStatusCode(200);

    }

    public function removeFromFavourite(CouponUpdateRequest $request, $id)
    {
        return $this->response()->setData($this->repository->removeFromFavorites($id))->setStatusCode(204);
    }


}
