<?php

namespace App\CouponApp\Modules\Coupons\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CouponUpdateRequest extends BaseRequest
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
