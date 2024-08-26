<?php

namespace App\CouponApp\Modules\Pages\Api\Controllers;

use App\CouponApp\Modules\Pages\Api\Services\PageService;
use App\CouponApp\Modules\Pages\Api\Requests\PageListRequest;
use App\CouponApp\Modules\Pages\Api\Requests\PageShowRequest;
use App\CouponApp\Modules\Pages\Api\Requests\PageUpdateRequest;
use App\CouponApp\Modules\Pages\Api\Requests\PageDeleteRequest;
use App\CouponApp\Modules\Pages\Api\Requests\PageCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;

class PageController extends BaseApiController
{
    protected PageService $service;

    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function index(PageListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(PageShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(PageCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        return response()->json($data, 201);
    }

    public function update(PageUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(PageDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
