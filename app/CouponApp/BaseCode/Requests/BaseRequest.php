<?php

namespace App\CouponApp\BaseCode\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }

    public static function validateRequest(Validator $validator): array
    {
        $errors = [];
        foreach ($validator->errors()->messages() as $key => $error) {
            $errors[$key] = $error[0];
        }

        return $errors;
    }
}
