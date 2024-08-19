<?php

namespace App\CouponApp\Modules\Contacts\Api\Services;

use App\CouponApp\Modules\Contacts\Api\Repositories\ContactRepository;

use App\CouponApp\BaseCode\Services\BaseService;

class ContactService extends BaseService
{

    public function __construct(ContactRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    // Add any additional API-specific methods or overrides here
}
