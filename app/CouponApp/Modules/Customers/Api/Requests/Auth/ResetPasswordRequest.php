<?php

namespace App\CouponApp\Modules\Customers\Api\Requests\Auth;

use App\CouponApp\BaseCode\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'otp' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    protected function passedValidation()
    {
        $this->merge(['identifier'=>$this->email]);
    }
}
