<?php

namespace App\CouponApp\Modules\Customers\Api\Requests\Auth;


use App\CouponApp\BaseCode\Requests\BaseRequest;

class SocialAuthRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'provider' => 'required|string',
            'token' => 'required|string',
        ];
    }
}
