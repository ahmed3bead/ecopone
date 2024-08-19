<?php

namespace App\CouponApp\Modules\Contacts\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class ContactListRequest extends BaseRequest
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
