<?php

use App\CouponApp\Modules\Categories\Api\Controllers\CategoryController;
use App\CouponApp\Modules\Countries\Api\Controllers\CountryController;
use App\CouponApp\Modules\CouponReactions\Api\Controllers\CouponReactionController;
use App\CouponApp\Modules\Coupons\Api\Controllers\CouponController;
use App\CouponApp\Modules\Customers\Api\Controllers\CustomerAuthController;
use App\CouponApp\Modules\Customers\Api\Controllers\CustomerController;
use App\CouponApp\Modules\FavouriteCoupons\Api\Controllers\FavouriteCouponController;
use App\CouponApp\Modules\FavouriteStores\Api\Controllers\FavouriteStoreController;
use App\CouponApp\Modules\Sliders\Api\Controllers\SliderController;
use App\CouponApp\Modules\Stores\Api\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')->group(function () {
    Route::prefix('auth')->group(function () {
        //    Customer Auth
        Route::post('/login', [CustomerAuthController::class, 'login']);
        Route::post('/register', [CustomerAuthController::class, 'register']);
        Route::post('/send-email-otp', [CustomerAuthController::class, 'sendEmailOtp']);
        Route::post('/verify-email-otp', [CustomerAuthController::class, 'verifyEmailOtp']);
        Route::post('/send-reset-link', [CustomerAuthController::class, 'sendResetLink']);
        Route::post('/reset-password', [CustomerAuthController::class, 'resetPassword']);
        Route::post('/social-auth', [CustomerAuthController::class, 'socialAuth']);
        Route::post('refresh-token', [CustomerAuthController::class, 'refreshToken']);
        Route::get('/me', [CustomerAuthController::class, 'me'])->middleware('auth:customers');
        Route::patch('/update-profile', [CustomerController::class, 'updateProfile'])->middleware('auth:customers');

        Route::get('auth/redirect/{provider}', [SocialAuthController::class, 'redirectToProvider']);
        Route::get('auth/callback/{provider}', [SocialAuthController::class, 'handleProviderCallback']);
    });


    Route::middleware('auth:customers')->group(function () {

        Route::get('/customers/{id}', [CustomerController::class, 'show']);
        Route::put('/customers/{id}', [CustomerController::class, 'update']);
        Route::delete('/customers/{id}', [CustomerController::class, 'delete']);

        Route::post('/coupons/add-to-favourite/{id}',[CouponController::class, 'addToFavourite']);
        Route::delete('/coupons/remove-from-favourite/{id}',[CouponController::class, 'removeFromFavourite']);
        Route::post('/coupons/add-new-reaction/{id}',[CouponController::class, 'addNewReaction']);

        Route::post('/stores/add-to-favourite/{id}',[StoreController::class, 'addToFavourite']);
        Route::delete('/stores/remove-from-favourite/{id}',[StoreController::class, 'removeFromFavourite']);

        Route::apiResource('coupon-reactions', CouponReactionController::class);
        Route::apiResource('favourite-stores', FavouriteStoreController::class);
        Route::apiResource('favourite-coupons', FavouriteCouponController::class);

    });

    Route::apiResource('coupons', CouponController::class);
    Route::apiResource('sliders', SliderController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('stores', StoreController::class);
    Route::apiResource('countries', CountryController::class);

    Route::apiResource('coupon-reactions', CouponReactionController::class);
    Route::apiResource('faq-categories', \App\CouponApp\Modules\FaqCategories\Api\Controllers\FaqCategoryController::class);
    Route::apiResource('faqs', \App\CouponApp\Modules\Faqs\Api\Controllers\FaqController::class);
    Route::apiResource('contacts', \App\CouponApp\Modules\Contacts\Api\Controllers\ContactController::class);

});



Route::apiResource('social-medias', \App\CouponApp\Modules\SocialMedia\Api\Controllers\SocialMediaController::class);