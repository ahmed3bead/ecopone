<?php

namespace App\CouponApp\Modules\Pages\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Pages\Web\Services\PageService;
use Illuminate\Http\Request;

use App\CouponApp\Modules\Pages\Web\Requests\PageListRequest;
use App\CouponApp\Modules\Pages\Web\Requests\PageShowRequest;
use App\CouponApp\Modules\Pages\Web\Requests\PageUpdateRequest;
use App\CouponApp\Modules\Pages\Web\Requests\PageDeleteRequest;
use App\CouponApp\Modules\Pages\Web\Requests\PageCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use App\CouponApp\BaseCode\Controllers\BaseApiController;

class PageController extends BaseApiController
{
    protected PageService $PageService;

    public function __construct(PageService $PageService)
    {
        $this->PageService = $PageService;
    }

        public function index(PageListRequest $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->PageService->all($request);
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(PageShowRequest $request, $id)
    {
        $data = $this->PageService->find($request,$id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(BaseRequest $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(PageCreateRequest $request)
    {
        $data = $this->PageService->create($request,$request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(BaseRequest $request,$id)
    {
        $data = $this->PageService->find($request,$id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(PageUpdateRequest $request, $id)
    {
        $data = $this->PageService->update($request,$request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(PageDeleteRequest  $request, $id)
    {
        $this->PageService->delete($request,$id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
