<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CrartController;
use App\Http\Controllers\DiscountController;
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
Route::get('/admin/login', [UserController::class,'get_login'])->middleware('loginadmin')->name('admin.get_login');
Route::post('/login', [UserController::class,'login_admin'])->name('admin.login_post');
Route::post('/logout-admin', [UserController::class,'logout_admin'])->name('admin.logout');

Route::prefix('admin')->middleware('checkrole')->group(function () {
    //admin 
    
    Route::get('/index', [HomeController::class,'index'])->name('home');
    // category

Route::get('create-category',[HomeController::class,'view_category'])->name('home');
Route::post('category',[CategoryController::class,'creates'])->name('admin.create-category');
Route::get('get_category_by_id/{id}',[CategoryController::class,'get_category_id'])->name('admin.get_category_id');
Route::get('data_category',[CategoryController::class,'select_data'])->name('admin.data_category');
Route::post('delete_category',[CategoryController::class,'delete_item'])->name('admin.delete_category');
Route::post('update_category',[CategoryController::class,'update_category'])->name('admin.update_category');
Route::post('update_trangthai',[CategoryController::class,'update_trangthai'])->name('admin.update_trangthai_category');
Route::get('create-product',[ProductController::class,'get_create_product'])->name('admin.get-create-product');
Route::post('create_product',[ProductController::class,'create_product'])->name('admin.create-product');
Route::get('product-management',[ProductController::class,'product_management'])->name('admin.product-management');
Route::get('get-product-id/{id}',[ProductController::class,'get_product_id']);
Route::post('product-delete',[ProductController::class,'delete_product'])->name('admin.delete_product');
Route::post('update-product',[ProductController::class,'update_product'])->name('admin.update_product');
Route::get('/order',[CrartController::class,'order_manager']);
Route::get('order_details/{id}',[CrartController::class,'order_details'])->name('admin.get_order_details');
Route::post('update_order/{id}', [CrartController::class,'update_order'])->name('admin.update_order');
// user
Route::get('create-user',[UserController::class,'index'])->name('admin.create_user_get');
Route::post('create-users',[UserController::class,'create_user'])->name('admin.create-user');
Route::get('user-management', [UserController::class,'user_management'])->name('admin.user-management');
Route::post('update-user', [UserController::class,'update_user'])->name('admin.update-user');
Route::post('lock-user', [UserController::class,'lock_user'])->name('admin.lock-user');
Route::get('discount-code',[DiscountController::class,'create']);
Route::post('/update-status-code', [DiscountController::class, 'updatestatuscode'])->name('update-status');

Route::post('discount-code',[DiscountController::class,'create_discount'])->name('admin.create_discount');






});   
Route::prefix('/')->group(function () {
    Route::get('/',[ClientController::class,'index'])->name('index');
    Route::get('/index',[ClientController::class,'index']);
    Route::get('/login',[ClientController::class,'login_user'])->name('client.get_login');
    Route::get('/register',[ClientController::class,'register_user'])->name('client.register_get');
    Route::get('/user',[ClientController::class,'user_user'])->name('client.user');
    Route::post('/user-logout',[UserController::class,'logout_user'])->name('client.logout');
    Route::post('/passwordblack',[UserController::class,'password_black'])->name('client.password_black');
    Route::get('/test-mail',[UserController::class,'test_mail']);
    Route::get('order-clients',[CrartController::class,'get_order_clients']);
    Route::get('order-client',[CrartController::class,'get_order_client']);
    

    Route::get('/get-user-token', function() {
        return response()->json([
            'token' => session('user')['token']
        ]);
    });
    Route::post('/get_usertk_token',[UserController::class,'get_user_token']);

    // post
    Route::post('/registers',[UserController::class,'create_user'])->name('client.register');
    Route::post('/logins',[UserController::class,'user_login'])->name('client.login');
    Route::post('/update-password',[UserController::class,'update_password'])->name('client.update_password');
    Route::get('/ForgotPasswordController',[UserController::class,'forgotPassword'])->name('client.forgotrassword');
    Route::post('/chane-password',[UserController::class,'chane_password'])->name('client.chane_password');
    Route::get('/password-back',[UserController::class,'password_back'])->name('client.password_back');
    //product 
    Route::get('product-detail/{id}', [ProductController::class,'product_detail'])->name('admin.product_detail');
    Route::get( 'checkout', [CrartController::class,'get_user_checkout'])->name('client.checkout');
    Route::post('checkout',[CrartController::class,'check_out'])->name('client.check_out');


    //cart - check out - shop
    Route::get('/shop',[ClientController::class,'get_shop'])->name('client.get_shop');

    Route::get('/cart',[CrartController::class,'cart_get']);
    Route::get('/history',[CrartController::class,'get_history'])->name('client.get_history');
    Route::get('search-products/{id}',[ClientController::class,'get_search_product'])->name('admin.get_search');
    Route::get('search-all-products',[ClientController::class,'get_all_product'])->name('admin.get_all_product');
    Route::get('search-category-products/{id}',[ClientController::class,'search_category_products'])->name('admin.search_category_products');
    Route::get('search-category',[ClientController::class,'search_category'])->name('admin.search_category');
    route::get('checkout-success',[CrartController::class,'get_user_checkout_success']);

    Route::get('validate-coupon/{code}', [DiscountController::class,'validateCoupon']);
    Route::post('apply-coupon/{code}', [DiscountController::class,'applyCoupon']);

});   