<?php

namespace App\CouponApp\Modules\Customers\Api\Repositories;

interface AuthRepositoryInterface
{
    public function findByEmail($email);
    public function create(array $data);
}
