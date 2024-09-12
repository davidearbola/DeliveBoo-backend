<?php

use App\Http\Controllers\Api\BraintreeController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\RestaurantsController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserLogController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    // Route::get('/userLogin', [UserLogController::class, 'getLog']);
});

Route::get('restaurants', [RestaurantsController::class, 'index']);
Route::get('restaurants/{restaurants_id}', [RestaurantsController::class, 'show']);

Route::get('restaurants/{restaurants_id}/products', [ProductsController::class, 'index']);
Route::get('restaurants/{restaurants_id}/products/{products_id}', [ProductsController::class, 'show']);

Route::get('categories', [CategoriesController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);

Route::get('/braintree/token', [BraintreeController::class, 'generateToken']);
Route::post('/braintree/checkout', [BraintreeController::class, 'checkout']);
