<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::resource('categories', \App\CouponApp\Modules\Categories\Web\Controllers\CategoryController::class);
Route::resource('countries', \App\CouponApp\Modules\Countries\Web\Controllers\CountryController::class);
Route::resource('coupons', \App\CouponApp\Modules\Coupons\Web\Controllers\CouponController::class);
Route::resource('stores', \App\CouponApp\Modules\Stores\Web\Controllers\StoreController::class);
Route::resource('customers', \App\CouponApp\Modules\Customers\Web\Controllers\CustomerController::class);
Route::resource('sliders', \App\CouponApp\Modules\Sliders\Web\Controllers\SliderController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('favourite-stores', \App\CouponApp\Modules\FavouriteStores\Web\Controllers\FavouriteStoreController::class);
Route::resource('favourite-coupons', \App\CouponApp\Modules\FavouriteCoupons\Web\Controllers\FavouriteCouponController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('coupon-reactions', \App\CouponApp\Modules\CouponReactions\Web\Controllers\CouponReactionController::class);
Route::resource('faq-categories', \App\CouponApp\Modules\FaqCategories\Web\Controllers\FaqCategoryController::class);
Route::resource('faqs', \App\CouponApp\Modules\Faqs\Web\Controllers\FaqController::class);

Route::resource('contacts', \App\CouponApp\Modules\Contacts\Web\Controllers\ContactController::class);
Route::resource('social-medias', \App\CouponApp\Modules\SocialMedia\Web\Controllers\SocialMediaController::class);