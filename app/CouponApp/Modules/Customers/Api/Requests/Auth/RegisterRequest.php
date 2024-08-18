<?php

namespace App\CouponApp\Modules\Customers\Api\Requests\Auth;

use App\CouponApp\BaseCode\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'mobile' => 'required|string|unique:customers,mobile',
            'password' => 'required|string|min:8|confirmed',
            'country_id' => 'required|exists:countries,id',
        ];
    }
}
