<?php

namespace App\CouponApp\Modules\Sliders\Api\Controllers;

use App\CouponApp\BaseCode\Http\Response;
use App\CouponApp\Modules\Sliders\Api\Services\SliderService;
use App\CouponApp\Modules\Sliders\Api\Requests\SliderListRequest;
use App\CouponApp\Modules\Sliders\Api\Requests\SliderShowRequest;
use App\CouponApp\Modules\Sliders\Api\Requests\SliderUpdateRequest;
use App\CouponApp\Modules\Sliders\Api\Requests\SliderDeleteRequest;
use App\CouponApp\Modules\Sliders\Api\Requests\SliderCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class SliderController extends BaseApiController
{
    protected SliderService $service;

    public function __construct(SliderService $service)
    {
        $this->service = $service;
    }

    public function index(SliderListRequest $request): JsonResponse|Response
    {
        return $this->service->all($request);
    }

    public function show(SliderShowRequest $request, $id): JsonResponse|Response
    {
        return $this->service->find($request, $id);
    }

    public function store(SliderCreateRequest $request): JsonResponse|Response
    {
        return $this->service->create($request, $request->all());
    }

    public function update(SliderUpdateRequest $request, $id): JsonResponse|Response
    {
        return $this->service->update($request, $request->all(), $id);
    }

    public function destroy(SliderDeleteRequest $request, $id): JsonResponse|Response
    {
        return $this->service->delete($request, $id);
    }
}
