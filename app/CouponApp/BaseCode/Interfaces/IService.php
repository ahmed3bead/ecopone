<?php

namespace App\CouponApp\BaseCode\Interfaces;

use Illuminate\Http\Request;

interface IService
{
    /**
     * Retrieve all records.
     *
     * @param Request $request
     * @return mixed
     */
    public function findAll(Request $request);

    /**
     * Retrieve a single record by value and field.
     *
     * @param Request $request
     * @param mixed $value
     * @return mixed
     */
    public function find(Request $request, mixed $value = null);

    /**
     * Create a new record.
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request);

    /**
     * Update an existing record.
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, int $id);

    /**
     * Delete a record.
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function delete(Request $request, int $id);
}
