<?php

namespace App\CouponApp\Modules\CouponReactions\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\CouponReactions\Web\Services\CouponReactionService;
use Illuminate\Http\Request;

use App\CouponApp\Modules\CouponReactions\Web\Requests\CouponReactionListRequest;
use App\CouponApp\Modules\CouponReactions\Web\Requests\CouponReactionShowRequest;
use App\CouponApp\Modules\CouponReactions\Web\Requests\CouponReactionUpdateRequest;
use App\CouponApp\Modules\CouponReactions\Web\Requests\CouponReactionDeleteRequest;
use App\CouponApp\Modules\CouponReactions\Web\Requests\CouponReactionCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use App\CouponApp\BaseCode\Controllers\BaseApiController;

class CouponReactionController extends BaseApiController
{
    protected CouponReactionService $CouponReactionService;

    public function __construct(CouponReactionService $CouponReactionService)
    {
        $this->CouponReactionService = $CouponReactionService;
    }

        public function index(CouponReactionListRequest $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->CouponReactionService->all($request);
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(CouponReactionShowRequest $request, $id)
    {
        $data = $this->CouponReactionService->find($request,$id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(BaseRequest $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(CouponReactionCreateRequest $request)
    {
        $data = $this->CouponReactionService->create($request,$request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(BaseRequest $request,$id)
    {
        $data = $this->CouponReactionService->find($request,$id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(CouponReactionUpdateRequest $request, $id)
    {
        $data = $this->CouponReactionService->update($request,$request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(CouponReactionDeleteRequest  $request, $id)
    {
        $this->CouponReactionService->delete($request,$id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
