<?php

namespace App\CouponApp\Modules\FavouriteStores\Api\Controllers;

use App\CouponApp\Modules\FavouriteStores\Api\Services\FavouriteStoreService;
use App\CouponApp\Modules\FavouriteStores\Api\Requests\FavouriteStoreListRequest;
use App\CouponApp\Modules\FavouriteStores\Api\Requests\FavouriteStoreShowRequest;
use App\CouponApp\Modules\FavouriteStores\Api\Requests\FavouriteStoreUpdateRequest;
use App\CouponApp\Modules\FavouriteStores\Api\Requests\FavouriteStoreDeleteRequest;
use App\CouponApp\Modules\FavouriteStores\Api\Requests\FavouriteStoreCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;
use App\CouponApp\BaseCode\Http\Response;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class FavouriteStoreController extends BaseApiController
{
    protected FavouriteStoreService $service;

    public function __construct(FavouriteStoreService $service)
    {
        $this->service = $service;
    }

    public function index(FavouriteStoreListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(FavouriteStoreShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(FavouriteStoreCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(FavouriteStoreUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(FavouriteStoreDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
