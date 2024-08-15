<?php

namespace App\CouponApp\Modules\Sliders\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Sliders\Web\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends VoyagerBaseController
{
    protected $SliderService;

    public function __construct(SliderService $SliderService)
    {
        $this->SliderService = $SliderService;
    }

    public function index(Request $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->SliderService->all();
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(Request $request,$id)
    {
        $data = $this->SliderService->find($id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(Request $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(Request $request)
    {
        $data = $this->SliderService->create($request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(Request $request,$id)
    {
        $data = $this->SliderService->find($id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->SliderService->update($request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(Request $request,$id)
    {
        $this->SliderService->delete($id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
