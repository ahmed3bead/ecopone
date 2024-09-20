<?php

namespace App\CouponApp\Modules\Occasions\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class OccasionShowRequest extends BaseRequest
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
