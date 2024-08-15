<?php

namespace App\CouponApp\Modules\Sliders\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class SliderUpdateRequest extends BaseRequest
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
