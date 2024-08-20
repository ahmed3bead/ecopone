<?php

namespace App\CouponApp\Modules\Contacts\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;


class ContactCreateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'full_name' => 'required|string|max:255',
            'reason' => 'required|string|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string|max:20'
        ];
    }
}
