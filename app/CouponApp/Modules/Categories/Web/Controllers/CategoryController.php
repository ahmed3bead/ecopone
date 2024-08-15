<?php

namespace App\CouponApp\Modules\Categories\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Categories\Web\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends VoyagerBaseController
{
    protected $CategoryService;

    public function __construct(CategoryService $CategoryService)
    {
        $this->CategoryService = $CategoryService;
    }

    public function index(Request $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->CategoryService->all();
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(Request $request,$id)
    {
        $data = $this->CategoryService->find($id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(Request $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(Request $request)
    {
        $data = $this->CategoryService->create($request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(Request $request,$id)
    {
        $data = $this->CategoryService->find($id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->CategoryService->update($request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(Request $request,$id)
    {
        $this->CategoryService->delete($id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
