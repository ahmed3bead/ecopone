<?php

namespace App\CouponApp\Modules\Stores\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class StoreShowRequest extends BaseRequest
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
