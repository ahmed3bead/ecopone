<?php

namespace App\CouponApp\Modules\Customers\Api\Services;

use App\CouponApp\BaseCode\Http\HttpStatus;
use App\CouponApp\Modules\Customers\Api\Repositories\CustomerAuthRepository;

use App\CouponApp\BaseCode\Services\BaseService;
use App\CouponApp\Modules\Customers\Web\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthService extends BaseService
{

    public function __construct(CustomerAuthRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }
    public function register($request,array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->repository->create($data);
    }

    public function login($request,array $credentials)
    {
        $user = Customer::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                CustomerAuth()->setUser($user);
                return $this->response()
                    ->setData([
                        'user' => $user,
                        'token' => $user->createToken('MerchantClient')->accessToken,

                    ])
                    ->setStatusCode(HttpStatus::HTTP_OK)->json();
            } else {
                $response = ["message" => "Password mismatch"];
                return $this->response()
                    ->setData($response)
                    ->setStatusCode(HttpStatus::HTTP_VALIDATION_ERROR)->json();
            }
        } else {
            $response = ["message" => 'Customer does not exist'];
            return response($response, 422);
        }
    }

    public function logout()
    {
        $user = CustomerAuth()->user()->token();
        $user->revoke();
        return $this->response()
            ->setData([
                'user' => (object)[],
                'token' => '',
            ])
            ->setStatusCode(HttpStatus::HTTP_OK)->json();
    }


    // Add any additional API-specific methods or overrides here
}
