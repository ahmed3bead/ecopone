<?php

namespace App\CouponApp\Modules\Occasions\Api\Controllers;

use App\CouponApp\Modules\Occasions\Api\Services\OccasionService;
use App\CouponApp\Modules\Occasions\Api\Requests\OccasionListRequest;
use App\CouponApp\Modules\Occasions\Api\Requests\OccasionShowRequest;
use App\CouponApp\Modules\Occasions\Api\Requests\OccasionUpdateRequest;
use App\CouponApp\Modules\Occasions\Api\Requests\OccasionDeleteRequest;
use App\CouponApp\Modules\Occasions\Api\Requests\OccasionCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class OccasionController extends BaseApiController
{
    protected OccasionService $service;

    public function __construct(OccasionService $service)
    {
        $this->service = $service;
    }

    public function index(OccasionListRequest $request): JsonResponse|Response
    {
        $data = $this->service->getAll($request);
        return response()->json($data);
    }

    public function show(OccasionShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(OccasionCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(OccasionUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(OccasionDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
