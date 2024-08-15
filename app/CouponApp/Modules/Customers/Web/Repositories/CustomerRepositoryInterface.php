<?php

namespace App\CouponApp\Modules\Customers\Web\Repositories;

interface CustomerRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
