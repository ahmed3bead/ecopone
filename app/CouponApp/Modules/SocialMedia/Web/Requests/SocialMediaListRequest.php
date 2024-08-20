<?php

namespace App\CouponApp\Modules\SocialMedia\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class SocialMediaListRequest extends BaseRequest
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
