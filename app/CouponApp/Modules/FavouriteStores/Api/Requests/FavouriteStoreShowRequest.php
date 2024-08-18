<?php

namespace App\CouponApp\Modules\FavouriteStores\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class FavouriteStoreShowRequest extends BaseRequest
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
