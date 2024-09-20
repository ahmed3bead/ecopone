<?php

namespace App\CouponApp\Modules\Occasions\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class OccasionCreateRequest extends BaseRequest
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
