<?php

namespace App\CouponApp\Modules\Pages\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class PageCreateRequest extends BaseRequest
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
