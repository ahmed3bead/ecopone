<?php

namespace App\CouponApp\Modules\FaqCategories\Api\Controllers;

use App\CouponApp\Modules\FaqCategories\Api\Services\FaqCategoryService;
use App\CouponApp\Modules\FaqCategories\Api\Requests\FaqCategoryListRequest;
use App\CouponApp\Modules\FaqCategories\Api\Requests\FaqCategoryShowRequest;
use App\CouponApp\Modules\FaqCategories\Api\Requests\FaqCategoryUpdateRequest;
use App\CouponApp\Modules\FaqCategories\Api\Requests\FaqCategoryDeleteRequest;
use App\CouponApp\Modules\FaqCategories\Api\Requests\FaqCategoryCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class FaqCategoryController extends BaseApiController
{
    protected FaqCategoryService $service;

    public function __construct(FaqCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(FaqCategoryListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(FaqCategoryShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(FaqCategoryCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(FaqCategoryUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(FaqCategoryDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
