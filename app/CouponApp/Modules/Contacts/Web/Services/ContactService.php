<?php

namespace App\CouponApp\Modules\Contacts\Web\Services;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Contacts\Web\Repositories\ContactRepository;

class ContactService extends BaseService
{
    public function __construct(ContactRepository $repository)
    {
        parent::__construct($repository);
    }

    // Implement any additional service methods if needed
}
