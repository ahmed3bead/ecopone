<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\FavouriteCoupons\Web\Services\FavouriteCouponService;
use Illuminate\Http\Request;

class FavouriteCouponController extends VoyagerBaseController
{
    protected $FavouriteCouponService;

    public function __construct(FavouriteCouponService $FavouriteCouponService)
    {
        $this->FavouriteCouponService = $FavouriteCouponService;
    }

    public function index(Request $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->FavouriteCouponService->all();
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(Request $request,$id)
    {
        $data = $this->FavouriteCouponService->find($id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(Request $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(Request $request)
    {
        $data = $this->FavouriteCouponService->create($request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(Request $request,$id)
    {
        $data = $this->FavouriteCouponService->find($id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->FavouriteCouponService->update($request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(Request $request,$id)
    {
        $this->FavouriteCouponService->delete($id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
