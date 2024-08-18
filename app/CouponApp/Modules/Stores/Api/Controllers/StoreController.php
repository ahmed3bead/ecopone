<?php

namespace App\CouponApp\Modules\Stores\Api\Controllers;

use App\CouponApp\BaseCode\Http\Response;
use App\CouponApp\Modules\Stores\Api\Services\StoreService;
use App\CouponApp\Modules\Stores\Api\Requests\StoreListRequest;
use App\CouponApp\Modules\Stores\Api\Requests\StoreShowRequest;
use App\CouponApp\Modules\Stores\Api\Requests\StoreUpdateRequest;
use App\CouponApp\Modules\Stores\Api\Requests\StoreDeleteRequest;
use App\CouponApp\Modules\Stores\Api\Requests\StoreCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class StoreController extends BaseApiController
{
    protected StoreService $service;

    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    public function index(StoreListRequest $request): JsonResponse|Response
    {
        return $this->service->all($request);
    }

    public function show(StoreShowRequest $request, $id): JsonResponse|Response
    {
        return $this->service->find($request, $id);
    }

    public function store(StoreCreateRequest $request): JsonResponse|Response
    {
        return $this->service->create($request, $request->all());
    }

    public function update(StoreUpdateRequest $request, $id): JsonResponse|Response
    {
        return $this->service->update($request, $request->all(), $id);
    }

    public function destroy(StoreDeleteRequest $request, $id): JsonResponse|Response
    {
        return $this->service->delete($request, $id);
    }

    public function addToFavourite(StoreUpdateRequest $request, $id): JsonResponse|Response
    {
        return $this->service->addToFavourite($request, $id);
    }

    public function removeFromFavourite(StoreUpdateRequest $request, $id)
    {
        return $this->service->removeFromFavorites($id);
    }
}
