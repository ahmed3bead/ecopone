<?php

namespace App\CouponApp\Modules\FavouriteStores\Api\Repositories;

interface FavouriteStoreRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
