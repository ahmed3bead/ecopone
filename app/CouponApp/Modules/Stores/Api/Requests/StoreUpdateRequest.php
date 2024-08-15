<?php

namespace App\CouponApp\Modules\Stores\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class StoreUpdateRequest extends BaseRequest
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
