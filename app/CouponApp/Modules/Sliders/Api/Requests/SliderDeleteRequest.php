<?php

namespace App\CouponApp\Modules\Sliders\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class SliderDeleteRequest extends BaseRequest
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
