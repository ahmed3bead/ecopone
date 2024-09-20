<?php

namespace App\CouponApp\Modules\Occasions\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Occasions\Web\Services\OccasionService;
use Illuminate\Http\Request;

use App\CouponApp\Modules\Occasions\Web\Requests\OccasionListRequest;
use App\CouponApp\Modules\Occasions\Web\Requests\OccasionShowRequest;
use App\CouponApp\Modules\Occasions\Web\Requests\OccasionUpdateRequest;
use App\CouponApp\Modules\Occasions\Web\Requests\OccasionDeleteRequest;
use App\CouponApp\Modules\Occasions\Web\Requests\OccasionCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use App\CouponApp\BaseCode\Controllers\BaseApiController;

class OccasionController extends BaseApiController
{
    protected OccasionService $OccasionService;

    public function __construct(OccasionService $OccasionService)
    {
        $this->OccasionService = $OccasionService;
    }

        public function index(OccasionListRequest $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->OccasionService->all($request);
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(OccasionShowRequest $request, $id)
    {
        $data = $this->OccasionService->find($request,$id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(BaseRequest $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(OccasionCreateRequest $request)
    {
        $data = $this->OccasionService->create($request,$request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(BaseRequest $request,$id)
    {
        $data = $this->OccasionService->find($request,$id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(OccasionUpdateRequest $request, $id)
    {
        $data = $this->OccasionService->update($request,$request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(OccasionDeleteRequest  $request, $id)
    {
        $this->OccasionService->delete($request,$id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
