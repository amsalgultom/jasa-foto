<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoModelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

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
    return view('pages.home');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/orderservices', [HomeController::class, 'userOrder'])->name('order.service');
Route::get('/myorderservices/{user_id}', [HomeController::class, 'myorderservices'])->name('myorderservices');
Route::get('/myorderservices/show/{order}', [HomeController::class, 'myorderservicesShow'])->name('myorderservices.show');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('products', ProductController::class);
Route::resource('models', PhotoModelController::class);

Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::get('/myorders/{user_id}', [OrderController::class, 'myorders'])->name('myorders');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/myorders/show/{order}', [OrderController::class, 'show'])->name('myorders.show');
Route::post('/myorders/payment', [OrderController::class, 'payment'])->name('myorders.payment');
Route::get('/myorders/result/{order}', [OrderController::class, 'resultUpload'])->name('myorders.result');

Route::get('/get-origins', [App\Http\Controllers\ShippingController::class, 'getOrigins']);
Route::get('/get-destinations', [App\Http\Controllers\ShippingController::class, 'getDestinations']);
Route::get('/calculate-shipping', [App\Http\Controllers\ShippingController::class, 'calculateShipping']);

Route::get('/clients', [CustomerController::class, 'index'])->name('clients');
Route::get('/orderupload/show/{order}', [AdminController::class, 'orderUpload'])->name('orderupload.show');
Route::get('/listorders', [AdminController::class, 'listOrders'])->name('listorders');

Route::post('/orderupload/store', [AdminController::class, 'store'])->name('orderupload.store');