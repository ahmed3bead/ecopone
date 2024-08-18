<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Api\Repositories;

interface FavouriteCouponRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
