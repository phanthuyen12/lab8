<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrartController;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function () {
    Route::get('order_user/{id}',[CrartController::class,'order_user'])->name('client.order_user');

});  
Route::prefix('/')->group(function(){
    Route::get('/categories', [ApiController::class, 'get_categories'])->name('api.get_categories');
    Route::get('/categories/{id}', [ApiController::class, 'get_product_categories'])->name('api.get_categories');
    Route::get('/products/{id}',[ApiController::class,'product_detail']);
    Route::post('/user', [ApiController::class, 'information_user'])->name('api.information_user');
    Route::post('/buy-products',[ApiController::class,'buy_products']);
    Route::get('/order/{madonhang}',[ApiController::class,'get_order']);
    Route::get('/province',[ApiController::class,'get_province']);
    Route::get('/district/{id}',[ApiController::class,'get_district']);
    Route::get('/ward/{id}',[ApiController::class,'get_Ward']);
    Route::get('/street/{id}',[ApiController::class,'get_street']);
        
});