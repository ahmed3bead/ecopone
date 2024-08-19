<?php

namespace App\CouponApp\Modules\FaqCategories\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\FaqCategories\Web\Services\FaqCategoryService;
use Illuminate\Http\Request;

use App\CouponApp\Modules\FaqCategories\Web\Requests\FaqCategoryListRequest;
use App\CouponApp\Modules\FaqCategories\Web\Requests\FaqCategoryShowRequest;
use App\CouponApp\Modules\FaqCategories\Web\Requests\FaqCategoryUpdateRequest;
use App\CouponApp\Modules\FaqCategories\Web\Requests\FaqCategoryDeleteRequest;
use App\CouponApp\Modules\FaqCategories\Web\Requests\FaqCategoryCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use App\CouponApp\BaseCode\Controllers\BaseApiController;

class FaqCategoryController extends BaseApiController
{
    protected FaqCategoryService $FaqCategoryService;

    public function __construct(FaqCategoryService $FaqCategoryService)
    {
        $this->FaqCategoryService = $FaqCategoryService;
    }

        public function index(FaqCategoryListRequest $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->FaqCategoryService->all($request);
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(FaqCategoryShowRequest $request, $id)
    {
        $data = $this->FaqCategoryService->find($request,$id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(BaseRequest $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(FaqCategoryCreateRequest $request)
    {
        $data = $this->FaqCategoryService->create($request,$request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(BaseRequest $request,$id)
    {
        $data = $this->FaqCategoryService->find($request,$id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(FaqCategoryUpdateRequest $request, $id)
    {
        $data = $this->FaqCategoryService->update($request,$request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(FaqCategoryDeleteRequest  $request, $id)
    {
        $this->FaqCategoryService->delete($request,$id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
