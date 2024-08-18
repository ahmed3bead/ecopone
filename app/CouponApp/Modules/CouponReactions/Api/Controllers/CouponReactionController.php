<?php

namespace App\CouponApp\Modules\CouponReactions\Api\Controllers;
use App\CouponApp\BaseCode\Http\Response;

use App\CouponApp\Modules\CouponReactions\Api\Services\CouponReactionService;
use App\CouponApp\Modules\CouponReactions\Api\Requests\CouponReactionListRequest;
use App\CouponApp\Modules\CouponReactions\Api\Requests\CouponReactionShowRequest;
use App\CouponApp\Modules\CouponReactions\Api\Requests\CouponReactionUpdateRequest;
use App\CouponApp\Modules\CouponReactions\Api\Requests\CouponReactionDeleteRequest;
use App\CouponApp\Modules\CouponReactions\Api\Requests\CouponReactionCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class CouponReactionController extends BaseApiController
{
    protected CouponReactionService $service;

    public function __construct(CouponReactionService $service)
    {
        $this->service = $service;
    }

    public function index(CouponReactionListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(CouponReactionShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(CouponReactionCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(CouponReactionUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(CouponReactionDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
