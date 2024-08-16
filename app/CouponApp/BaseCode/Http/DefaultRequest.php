<?php

namespace App\CouponApp\BaseCode\Http;

use App\CouponApp\BaseCode\Requests\BaseRequest;

class DefaultRequest extends BaseRequest
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
