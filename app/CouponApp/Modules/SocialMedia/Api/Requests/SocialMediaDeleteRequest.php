<?php

namespace App\CouponApp\Modules\SocialMedias\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class SocialMediaDeleteRequest extends BaseRequest
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
