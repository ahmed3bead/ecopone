<?php

namespace App\CouponApp\Modules\Categories\Api\Repositories;

interface CategoryRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
