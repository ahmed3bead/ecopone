<?php

namespace App\CouponApp\BaseCode\Controllers;

use App\CouponApp\BaseCode\Requests\BaseRequest;
use Illuminate\Routing\Controller as BaseParentController;
use App\CouponApp\BaseCode\Interfaces\IController;

abstract class BaseController extends BaseParentController implements IController
{
    protected string $moduleName;

    /**
     * BaseController constructor.
     *
     * @param  string  $moduleName
     */
    public function __construct(string $moduleName)
    {
        $this->moduleName = $moduleName;
    }

    /**
     * Display a listing of the resource.
     *
     * @param BaseRequest $request
     * @return \Illuminate\View\View
     */
    public function index(BaseRequest $request)
    {
        $data = $this->service->findAll($request);
        return view("{$this->moduleName}.index", ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param BaseRequest $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(BaseRequest $request, int $id)
    {
        $data = $this->service->find($request, $id);
        return view("{$this->moduleName}.show", ['data' => $data]);
    }

    /**
     * Display the create form.
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
        return view("{$this->moduleName}.create", []); // For web
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BaseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BaseRequest $request)
    {
        $this->service->create($request);
        return redirect()->route("{$this->moduleName}.index")->with('success', 'Resource created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BaseRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BaseRequest $request, int $id)
    {
        $this->service->update($request, $id);
        return redirect()->route("{$this->moduleName}.index")->with('success', 'Resource updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BaseRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BaseRequest $request, int $id)
    {
        $this->service->delete($request, $id);
        return redirect()->route("{$this->moduleName}.index")->with('success', 'Resource deleted successfully.');
    }
}
