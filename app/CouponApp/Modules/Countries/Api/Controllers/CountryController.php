<?php

namespace App\CouponApp\Modules\Countries\Api\Controllers;

use App\CouponApp\BaseCode\Http\Response;
use App\CouponApp\Modules\Countries\Api\Services\CountryService;
use App\CouponApp\Modules\Countries\Api\Requests\CountryListRequest;
use App\CouponApp\Modules\Countries\Api\Requests\CountryShowRequest;
use App\CouponApp\Modules\Countries\Api\Requests\CountryUpdateRequest;
use App\CouponApp\Modules\Countries\Api\Requests\CountryDeleteRequest;
use App\CouponApp\Modules\Countries\Api\Requests\CountryCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class CountryController extends BaseApiController
{
    protected CountryService $service;

    public function __construct(CountryService $service)
    {
        $this->service = $service;
    }

    public function index(CountryListRequest $request): JsonResponse|Response
    {
        return $this->service->all($request);
    }

    public function show(CountryShowRequest $request, $id): JsonResponse|Response
    {
        return $this->service->find($request,$id);
    }

    public function store(CountryCreateRequest $request): JsonResponse|Response
    {
        return $this->service->create($request,$request->all());
    }

    public function update(CountryUpdateRequest $request, $id): JsonResponse|Response
    {
        return  $this->service->update($request,$request->all(),$id);
    }

    public function destroy(CountryDeleteRequest  $request, $id): JsonResponse|Response
    {
        return $this->service->delete($request,$id);
    }
}
