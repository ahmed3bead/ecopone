<?php

namespace App\CouponApp\Modules\Countries\Api\Repositories;

interface CountryRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
