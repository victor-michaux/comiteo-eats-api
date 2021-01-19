<?php

use App\Http\Controllers\FeaturedRestaurantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDeliveryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantRatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', RestaurantController::class.'@index')->name('restaurants.index');
Route::get('/featured_restaurant', FeaturedRestaurantController::class.'@show')->name('featured_restaurant.show');
Route::post('/restaurants/{restaurant}/ratings', RestaurantRatingController::class.'@store')->name('restaurants.ratings.store');
Route::post('/orders', OrderController::class.'@store')->name('orders.store');
Route::get('/delivery_methods', OrderDeliveryController::class.'@index')->name('delivery_methods.index');
