<?php

namespace App\CouponApp\Modules\Contacts\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Contacts\Web\Services\ContactService;
use Illuminate\Http\Request;

use App\CouponApp\Modules\Contacts\Web\Requests\ContactListRequest;
use App\CouponApp\Modules\Contacts\Web\Requests\ContactShowRequest;
use App\CouponApp\Modules\Contacts\Web\Requests\ContactUpdateRequest;
use App\CouponApp\Modules\Contacts\Web\Requests\ContactDeleteRequest;
use App\CouponApp\Modules\Contacts\Web\Requests\ContactCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use App\CouponApp\BaseCode\Controllers\BaseApiController;

class ContactController extends BaseApiController
{
    protected ContactService $ContactService;

    public function __construct(ContactService $ContactService)
    {
        $this->ContactService = $ContactService;
    }

        public function index(ContactListRequest $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->ContactService->all($request);
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(ContactShowRequest $request, $id)
    {
        $data = $this->ContactService->find($request,$id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(BaseRequest $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(ContactCreateRequest $request)
    {
        $data = $this->ContactService->create($request,$request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(BaseRequest $request,$id)
    {
        $data = $this->ContactService->find($request,$id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(ContactUpdateRequest $request, $id)
    {
        $data = $this->ContactService->update($request,$request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(ContactDeleteRequest  $request, $id)
    {
        $this->ContactService->delete($request,$id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
