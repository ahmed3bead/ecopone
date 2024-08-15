<?php

namespace App\CouponApp\Modules\Customers\Api\Requests\Auth;

use App\CouponApp\BaseCode\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class SendEmailOtpRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
        ];
    }
}
