<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class FavouriteCouponShowRequest extends BaseRequest
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
