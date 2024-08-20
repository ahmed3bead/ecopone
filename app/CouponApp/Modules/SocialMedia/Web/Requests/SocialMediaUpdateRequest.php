<?php

namespace App\CouponApp\Modules\SocialMedia\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class SocialMediaUpdateRequest extends BaseRequest
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
