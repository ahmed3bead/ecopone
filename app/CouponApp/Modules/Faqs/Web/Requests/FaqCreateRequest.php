<?php

namespace App\CouponApp\Modules\Faqs\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class FaqCreateRequest extends BaseRequest
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
