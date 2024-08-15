<?php

namespace App\CouponApp\Modules\Customers\Api\Requests\Auth;

use App\CouponApp\BaseCode\Requests\BaseRequest;

class RefreshTokenRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'refresh_token' => 'required|string',
        ];
    }
}
