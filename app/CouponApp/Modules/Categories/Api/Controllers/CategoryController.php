<?php

namespace App\CouponApp\Modules\Categories\Api\Controllers;

use App\CouponApp\Modules\Categories\Api\Services\CategoryService;
use App\CouponApp\Modules\Categories\Api\Requests\CategoryListRequest;
use App\CouponApp\Modules\Categories\Api\Requests\CategoryShowRequest;
use App\CouponApp\Modules\Categories\Api\Requests\CategoryUpdateRequest;
use App\CouponApp\Modules\Categories\Api\Requests\CategoryDeleteRequest;
use App\CouponApp\Modules\Categories\Api\Requests\CategoryCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;
use App\CouponApp\BaseCode\Http\Response;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class CategoryController extends BaseApiController
{
    protected CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(CategoryListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(CategoryShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(CategoryCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(CategoryUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(CategoryDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
