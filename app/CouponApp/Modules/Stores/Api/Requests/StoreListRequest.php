<?php

namespace App\CouponApp\Modules\Stores\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class StoreListRequest extends BaseRequest
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
