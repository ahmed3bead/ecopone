<?php

namespace App\CouponApp\Modules\Coupons\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Coupons\Web\Services\CouponService;
use Illuminate\Http\Request;

class CouponController extends VoyagerBaseController
{
    protected $CouponService;

    public function __construct(CouponService $CouponService)
    {
        $this->CouponService = $CouponService;
    }

    public function index(Request $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->CouponService->all();
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(Request $request,$id)
    {
        $data = $this->CouponService->find($id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(Request $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(Request $request)
    {
        $data = $this->CouponService->create($request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(Request $request,$id)
    {
        $data = $this->CouponService->find($id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->CouponService->update($request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(Request $request,$id)
    {
        $this->CouponService->delete($id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
