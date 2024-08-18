<?php

namespace App\CouponApp\Modules\FavouriteStores\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\FavouriteStores\Web\Services\FavouriteStoreService;
use Illuminate\Http\Request;

class FavouriteStoreController extends VoyagerBaseController
{
    protected $FavouriteStoreService;

    public function __construct(FavouriteStoreService $FavouriteStoreService)
    {
        $this->FavouriteStoreService = $FavouriteStoreService;
    }

    public function index(Request $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->FavouriteStoreService->all();
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(Request $request,$id)
    {
        $data = $this->FavouriteStoreService->find($id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(Request $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(Request $request)
    {
        $data = $this->FavouriteStoreService->create($request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(Request $request,$id)
    {
        $data = $this->FavouriteStoreService->find($id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->FavouriteStoreService->update($request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(Request $request,$id)
    {
        $this->FavouriteStoreService->delete($id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
