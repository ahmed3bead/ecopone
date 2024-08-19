<?php

namespace App\CouponApp\Modules\Faqs\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class FaqUpdateRequest extends BaseRequest
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
