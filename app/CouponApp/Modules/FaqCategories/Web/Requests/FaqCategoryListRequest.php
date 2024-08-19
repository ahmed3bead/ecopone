<?php

namespace App\CouponApp\Modules\FaqCategories\Web\Requests;

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
