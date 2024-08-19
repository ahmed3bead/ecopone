<?php

namespace App\CouponApp\Modules\Contacts\Api\Controllers;

use App\CouponApp\BaseCode\Http\Response;
use App\CouponApp\Modules\Contacts\Api\Services\ContactService;
use App\CouponApp\Modules\Contacts\Api\Requests\ContactListRequest;
use App\CouponApp\Modules\Contacts\Api\Requests\ContactShowRequest;
use App\CouponApp\Modules\Contacts\Api\Requests\ContactUpdateRequest;
use App\CouponApp\Modules\Contacts\Api\Requests\ContactDeleteRequest;
use App\CouponApp\Modules\Contacts\Api\Requests\ContactCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use Illuminate\Http\JsonResponse;
use App\CouponApp\BaseCode\Controllers\BaseApiController;
use Illuminate\Support\Facades\Mail;

class ContactController extends BaseApiController
{
    protected ContactService $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index(ContactListRequest $request): JsonResponse|Response
    {
        $data = $this->service->all($request);
        return response()->json($data);
    }

    public function show(ContactShowRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->find($request,$id);
        return response()->json($data);
    }

    public function store(ContactCreateRequest $request): JsonResponse|Response
    {
        $data = $this->service->create($request,$request->all());
        Mail::send('emails.contact', ['contact' => $request], function ($m) {
            $m->to('info@ecopone.com')->subject('New Contact Message Received');
        });
        return response()->json($data, 201);
    }

    public function update(ContactUpdateRequest $request, $id): JsonResponse|Response
    {
        $data = $this->service->update($request,$request->all(),$id);
        return response()->json($data);
    }

    public function destroy(ContactDeleteRequest  $request, $id): JsonResponse|Response
    {
        $this->service->delete($request,$id);
        return response()->json(null, 204);
    }
}
