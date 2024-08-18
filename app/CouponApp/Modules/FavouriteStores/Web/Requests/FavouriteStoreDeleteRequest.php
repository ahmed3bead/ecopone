<?php

namespace App\CouponApp\Modules\FavouriteStores\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class FavouriteStoreDeleteRequest extends BaseRequest
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
