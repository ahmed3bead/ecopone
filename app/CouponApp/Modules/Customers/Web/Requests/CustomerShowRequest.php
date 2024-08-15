<?php

namespace App\CouponApp\Modules\Customers\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CustomerShowRequest extends BaseRequest
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
