<?php

namespace App\CouponApp\Modules\Contacts\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class ContactUpdateRequest extends BaseRequest
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
