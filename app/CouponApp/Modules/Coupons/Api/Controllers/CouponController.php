<?php

namespace App\CouponApp\Modules\Coupons\Api\Controllers;

use App\CouponApp\Modules\Coupons\Api\Services\CouponService;
use App\CouponApp\Modules\Coupons\Api\Requests\CouponListRequest;
use App\CouponApp\Modules\Coupons\Api\Requests\CouponShowRequest;
use App\CouponApp\Modules\Coupons\Api\Requests\CouponUpdateRequest;
use App\CouponApp\Modules\Coupons\Api\Requests\CouponDeleteRequest;
use App\CouponApp\Modules\Coupons\Api\Requests\CouponCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;
use App\CouponApp\BaseCode\Http\Response;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class CouponController extends BaseApiController
{
    protected CouponService $service;

    public function __construct(CouponService $service)
    {
        $this->service = $service;
    }

    public function index(CouponListRequest $request): JsonResponse|Response
    {
        return $this->service->all($request);
    }

    public function show(CouponShowRequest $request, $id): JsonResponse|Response
    {
        return $this->service->find($request,$id);
    }

    public function store(CouponCreateRequest $request): JsonResponse|Response
    {
        return $this->service->create($request,$request->all());
    }

    public function update(CouponUpdateRequest $request, $id): JsonResponse|Response
    {
        return $this->service->update($request,$request->all(),$id);
    }

    public function destroy(CouponDeleteRequest  $request, $id): JsonResponse|Response
    {
        return $this->service->delete($request,$id);
    }

    public function addToFavourite(CouponUpdateRequest $request, $id): JsonResponse|Response
    {
        return $this->service->addToFavourite($request,$id);
    }
    public function addNewReaction(CouponUpdateRequest $request, $id): JsonResponse|Response
    {
        return $this->service->addNewReaction($request,$id);
    }
    public function removeFromFavourite(CouponUpdateRequest $request, $id): JsonResponse|Response
    {
        return $this->service->removeFromFavourite($request,$id);
    }
}
