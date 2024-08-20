<?php

namespace App\CouponApp\Modules\SocialMedia\Api\Controllers;

use App\CouponApp\Modules\SocialMedia\Api\Services\SocialMediaService;
use App\CouponApp\Modules\SocialMedia\Api\Requests\SocialMediaListRequest;
use App\CouponApp\Modules\SocialMedia\Api\Requests\SocialMediaShowRequest;
use App\CouponApp\Modules\SocialMedia\Api\Requests\SocialMediaUpdateRequest;
use App\CouponApp\Modules\SocialMedia\Api\Requests\SocialMediaDeleteRequest;
use App\CouponApp\Modules\SocialMedia\Api\Requests\SocialMediaCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class SocialMediaController extends BaseApiController
{
    protected SocialMediaService $service;

    public function __construct(SocialMediaService $service)
    {
        $this->service = $service;
    }

    public function index(SocialMediaListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(SocialMediaShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(SocialMediaCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(SocialMediaUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(SocialMediaDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
