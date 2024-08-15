<?php

namespace App\CouponApp\Modules\Stores\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Stores\Web\Services\StoreService;
use Illuminate\Http\Request;

class StoreController extends VoyagerBaseController
{
    protected $StoreService;

    public function __construct(StoreService $StoreService)
    {
        $this->StoreService = $StoreService;
    }

    public function index(Request $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->StoreService->all();
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(Request $request,$id)
    {
        $data = $this->StoreService->find($id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(Request $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(Request $request)
    {
        $data = $this->StoreService->create($request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(Request $request,$id)
    {
        $data = $this->StoreService->find($id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->StoreService->update($request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(Request $request,$id)
    {
        $this->StoreService->delete($id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
