<?php

namespace App\CouponApp\Modules\Countries\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CountryDeleteRequest extends BaseRequest
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
