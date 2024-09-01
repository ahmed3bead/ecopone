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

        $authUser = Customer::updateOrCreate([
            'provider_id' => $user->getId(),
            'provider' => $provider,
        ], [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'logo' => $user->getAvatar(),
            'password' => \Hash::make('password'),
            // Add any other fields you need
        ]);

        // Generate token for API

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
