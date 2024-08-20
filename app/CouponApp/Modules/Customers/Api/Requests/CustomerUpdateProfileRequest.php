<?php

namespace App\CouponApp\Modules\Customers\Api\Requests;

use App\CouponApp\BaseCode\Requests\BaseRequest;


class CustomerUpdateProfileRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "sometimes|string",
            "mobile" => "sometimes|string",
            "birthday" => "sometimes|string",
            "gender" => "sometimes|string"
        ];
    }
}
