<?php

namespace App\CouponApp\Modules\Customers\Api\Controllers;

use App\CouponApp\Modules\Customers\Api\Requests\Auth\LoginRequest;
use App\CouponApp\Modules\Customers\Api\Requests\Auth\MeRequest;
use App\CouponApp\Modules\Customers\Api\Requests\Auth\RefreshTokenRequest;
use App\CouponApp\Modules\Customers\Api\Requests\Auth\RegisterRequest;
use App\CouponApp\Modules\Customers\Api\Requests\Auth\ResetPasswordRequest;
use App\CouponApp\Modules\Customers\Api\Requests\Auth\SendEmailOtpRequest;
use App\CouponApp\Modules\Customers\Api\Requests\Auth\SendResetLinkRequest;
use App\CouponApp\Modules\Customers\Api\Requests\Auth\SocialAuthRequest;
use App\CouponApp\Modules\Customers\Api\Requests\Auth\VerifyEmailOtpRequest;
use App\CouponApp\Modules\Customers\Api\Services\CustomerAuthService;
use App\CouponApp\BaseCode\Controllers\BaseApiController;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends BaseApiController
{
    protected CustomerAuthService $authService;

    public function __construct(CustomerAuthService $service)
    {
        $this->authService = $service;
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        return $this->authService->login($request,$credentials);
    }

    public function register(RegisterRequest $request)
    {
        return $this->authService->register($request,$request->validated());
    }

    public function sendEmailOtp(SendEmailOtpRequest $request)
    {
        return $this->authService->sendEmailOtp($request,$request->validated());
    }

    public function verifyEmailOtp(VerifyEmailOtpRequest $request)
    {
        return $this->authService->verifyEmailOtp($request,$request->validated());
    }

    public function sendResetLink(SendResetLinkRequest $request)
    {
        return $this->authService->sendResetLink($request,$request->validated());
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        return $this->authService->resetPassword($request,$request->validated());
    }

    public function deleteAccount(ResetPasswordRequest $request)
    {
        return $this->authService->deleteAccount($request,$request->validated());
    }

    public function socialAuth(SocialAuthRequest $request)
    {
        // Implement social authentication logic
    }

    public function refreshToken(RefreshTokenRequest $request)
    {
        // Implement refresh token logic
    }

    public function me(MeRequest $request)
    {
        return response()->json(CustomerAuth()->user());
    }
}
