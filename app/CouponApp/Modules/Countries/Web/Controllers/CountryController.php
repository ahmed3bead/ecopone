<?php

namespace App\CouponApp\Modules\Countries\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Countries\Web\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends VoyagerBaseController
{
    protected $CountryService;

    public function __construct(CountryService $CountryService)
    {
        $this->CountryService = $CountryService;
    }

    public function index(Request $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->CountryService->all();
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(Request $request,$id)
    {
        $data = $this->CountryService->find($id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(Request $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(Request $request)
    {
        $data = $this->CountryService->create($request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(Request $request,$id)
    {
        $data = $this->CountryService->find($id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->CountryService->update($request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(Request $request,$id)
    {
        $this->CountryService->delete($id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
