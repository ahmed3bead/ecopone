<?php

namespace App\CouponApp\Modules\CouponReactions\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CouponReactionCreateRequest extends BaseRequest
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
