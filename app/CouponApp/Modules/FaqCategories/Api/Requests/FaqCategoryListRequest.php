<?php

namespace App\CouponApp\Modules\FaqCategories\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class FaqCategoryListRequest extends BaseRequest
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
