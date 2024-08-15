<?php

namespace App\CouponApp\Modules\Coupons\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CouponCreateRequest extends BaseRequest
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
