<?php

namespace App\CouponApp\Modules\Categories\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CategoryShowRequest extends BaseRequest
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
