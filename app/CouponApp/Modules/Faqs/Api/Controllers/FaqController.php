<?php

namespace App\CouponApp\Modules\Faqs\Api\Controllers;

use App\CouponApp\Modules\Faqs\Api\Services\FaqService;
use App\CouponApp\Modules\Faqs\Api\Requests\FaqListRequest;
use App\CouponApp\Modules\Faqs\Api\Requests\FaqShowRequest;
use App\CouponApp\Modules\Faqs\Api\Requests\FaqUpdateRequest;
use App\CouponApp\Modules\Faqs\Api\Requests\FaqDeleteRequest;
use App\CouponApp\Modules\Faqs\Api\Requests\FaqCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class FaqController extends BaseApiController
{
    protected FaqService $service;

    public function __construct(FaqService $service)
    {
        $this->service = $service;
    }

    public function index(FaqListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(FaqShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(FaqCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(FaqUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(FaqDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
