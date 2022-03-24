<?php

use App\Http\Middleware\OnlyAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/add_product/{id}', [CartController::class, 'add_product']);
Route::get('/cartpage', [CartController::class, 'add_to_cart']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/checkout', [OrderController::class, 'store']);
Route::post('/', [ReviewController::class, 'review']);






Route::get('/item/{id}', [HomeController::class, 'product']);
Route::get('/cart/remove/{id}', [CartController::class, 'cart_remove']);
Route::get('/cart/cart_remove_one_product/{id}', [CartController::class, 'cart_remove_one_product']);
Route::get('/cart/cart_add_one_product/{id}', [CartController::class, 'cart_add_one_product']);






Route::prefix('/admin')->middleware(['auth', OnlyAdmin::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::get('/order_list', [OrderController::class, 'create']);
    Route::post('/update', [OrderController::class, 'update']);
    Route::get('/review_list', [ReviewController::class, 'index']);
    Route::post('/update_status', [ReviewController::class, 'store']);
    Route::get('/review/status_update/{id}', [ReviewController::class, 'edit']);
});

require __DIR__ . '/auth.php';
