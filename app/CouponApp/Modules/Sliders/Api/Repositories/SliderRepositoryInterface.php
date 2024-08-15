<?php

namespace App\CouponApp\Modules\Sliders\Api\Repositories;

interface SliderRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
