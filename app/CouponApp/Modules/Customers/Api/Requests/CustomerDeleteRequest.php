<?php

namespace App\CouponApp\Modules\Customers\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CustomerDeleteRequest extends BaseRequest
{
    public function authorize(): bool
        {
            return true;
        }

        public function rules(): array
            {
                return [];
            }
}
