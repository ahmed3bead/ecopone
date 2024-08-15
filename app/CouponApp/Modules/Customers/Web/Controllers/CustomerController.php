<?php

namespace App\CouponApp\Modules\Customers\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\Customers\Web\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends VoyagerBaseController
{
    protected $CustomerService;

    public function __construct(CustomerService $CustomerService)
    {
        $this->CustomerService = $CustomerService;
    }

    public function index(Request $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->CustomerService->all();
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(Request $request,$id)
    {
        $data = $this->CustomerService->find($id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(Request $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(Request $request)
    {
        $data = $this->CustomerService->create($request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(Request $request,$id)
    {
        $data = $this->CustomerService->find($id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->CustomerService->update($request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(Request $request,$id)
    {
        $this->CustomerService->delete($id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
