<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class FavouriteCouponDeleteRequest extends BaseRequest
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
