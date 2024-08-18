<?php

namespace App\CouponApp\Modules\Stores\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class StoreDeleteRequest extends BaseRequest
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
