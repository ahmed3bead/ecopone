<?php

namespace App\CouponApp\Modules\FavouriteCoupons\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class FavouriteCouponListRequest extends BaseRequest
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
