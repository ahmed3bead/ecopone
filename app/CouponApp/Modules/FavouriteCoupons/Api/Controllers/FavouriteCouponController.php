<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Api\Controllers;

use App\CouponApp\Modules\FavouriteCoupons\Api\Services\FavouriteCouponService;
use App\CouponApp\Modules\FavouriteCoupons\Api\Requests\FavouriteCouponListRequest;
use App\CouponApp\Modules\FavouriteCoupons\Api\Requests\FavouriteCouponShowRequest;
use App\CouponApp\Modules\FavouriteCoupons\Api\Requests\FavouriteCouponUpdateRequest;
use App\CouponApp\Modules\FavouriteCoupons\Api\Requests\FavouriteCouponDeleteRequest;
use App\CouponApp\Modules\FavouriteCoupons\Api\Requests\FavouriteCouponCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;
use App\CouponApp\BaseCode\Http\Response;

class FavouriteCouponController extends BaseApiController
{
    protected FavouriteCouponService $service;

    public function __construct(FavouriteCouponService $service)
    {
        $this->service = $service;
    }

    public function index(FavouriteCouponListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(FavouriteCouponShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(FavouriteCouponCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(FavouriteCouponUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(FavouriteCouponDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
