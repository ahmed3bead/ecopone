<?php

namespace App\CouponApp\Modules\CouponReactions\Web\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;



class CouponReactionDeleteRequest extends BaseRequest
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
