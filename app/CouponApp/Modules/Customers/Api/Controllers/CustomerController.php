<?php

namespace App\CouponApp\Modules\Customers\Api\Controllers;

use App\CouponApp\BaseCode\Http\Response;
use App\CouponApp\Modules\Customers\Api\Services\CustomerService;
use App\CouponApp\Modules\Customers\Api\Requests\CustomerListRequest;
use App\CouponApp\Modules\Customers\Api\Requests\CustomerShowRequest;
use App\CouponApp\Modules\Customers\Api\Requests\CustomerUpdateRequest;
use App\CouponApp\Modules\Customers\Api\Requests\CustomerDeleteRequest;
use App\CouponApp\Modules\Customers\Api\Requests\CustomerCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class CustomerController extends BaseApiController
{
    protected CustomerService $service;

    public function __construct(CustomerService $service)
    {
        $this->service = $service;
    }

    public function index(CustomerListRequest $request): JsonResponse|Response
    {
        return $this->service->all($request);
    }

    public function show(CustomerShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(CustomerCreateRequest $request): JsonResponse|Response
    {
        return $this->service->create($request,$request->all());
    }

    public function update(CustomerUpdateRequest $request, $id): JsonResponse|Response
    {
        return $this->service->update($request,$request->all(),$id);
    }

    public function destroy(CustomerDeleteRequest  $request, $id): JsonResponse|Response
    {
        return $this->service->delete($request,$id);
    }
}
