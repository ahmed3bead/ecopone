<?php

namespace App\CouponApp\Modules\Customers\Api\Controllers;

use App\CouponApp\BaseCode\Controllers\BaseApiController;
use App\CouponApp\BaseCode\Http\HttpStatus;
use App\CouponApp\Modules\Customers\Web\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
class CustomersSocialAuthController extends BaseApiController
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        // Find or create a user in your database
        // For example:
        $authUser = Customer::where('email', $user->getEmail())->first();

        if (!$authUser) {
            $authUser = Customer::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt(Str::random(16)), // Create a password for the user
            ]);
        }
        CustomerAuth()->setUser($authUser);
        CustomerAuth()->login($authUser,true);

        return $this->response()
            ->setData([
                'user' => $authUser,
                'token' => $authUser->createToken('Customers')->accessToken,

            ])
            ->setStatusCode(HttpStatus::HTTP_OK)->json();
    }
}
