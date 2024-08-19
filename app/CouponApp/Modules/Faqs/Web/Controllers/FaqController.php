<?php

namespace App\CouponApp\Modules\Faqs\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Faqs\Web\Services\FaqService;
use Illuminate\Http\Request;

use App\CouponApp\Modules\Faqs\Web\Requests\FaqListRequest;
use App\CouponApp\Modules\Faqs\Web\Requests\FaqShowRequest;
use App\CouponApp\Modules\Faqs\Web\Requests\FaqUpdateRequest;
use App\CouponApp\Modules\Faqs\Web\Requests\FaqDeleteRequest;
use App\CouponApp\Modules\Faqs\Web\Requests\FaqCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use App\CouponApp\BaseCode\Controllers\BaseApiController;

class FaqController extends BaseApiController
{
    protected FaqService $FaqService;

    public function __construct(FaqService $FaqService)
    {
        $this->FaqService = $FaqService;
    }

        public function index(FaqListRequest $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->FaqService->all($request);
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(FaqShowRequest $request, $id)
    {
        $data = $this->FaqService->find($request,$id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(BaseRequest $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(FaqCreateRequest $request)
    {
        $data = $this->FaqService->create($request,$request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(BaseRequest $request,$id)
    {
        $data = $this->FaqService->find($request,$id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(FaqUpdateRequest $request, $id)
    {
        $data = $this->FaqService->update($request,$request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(FaqDeleteRequest  $request, $id)
    {
        $this->FaqService->delete($request,$id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
