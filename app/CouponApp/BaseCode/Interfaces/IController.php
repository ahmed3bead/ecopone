<?php

namespace App\CouponApp\BaseCode\Interfaces;

use App\CouponApp\BaseCode\Requests\BaseRequest;
use Illuminate\Http\Request;

interface IController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(BaseRequest $request);

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function show(BaseRequest $request, int $id);

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(BaseRequest $request);

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function update(BaseRequest $request, int $id);

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function destroy(BaseRequest $request, int $id);
}
