<?php

namespace App\CouponApp\Modules\Categories\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CategoryCreateRequest extends BaseRequest
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
