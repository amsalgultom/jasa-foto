<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoModelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhotoBackgroundController;
use App\Http\Controllers\VoucherController;

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
Route::get('/ourservices', [HomeController::class, 'ourservices'])->name('ourservices');
Route::get('/procedur', [HomeController::class, 'procedure'])->name('procedure');
Route::get('/orderservices', [HomeController::class, 'userOrder'])->name('order.service')->middleware('auth');;
Route::get('/myorderservices/{user_id}', [HomeController::class, 'myorderservices'])->name('myorderservices');
Route::get('/myorderservices/show/{order}', [HomeController::class, 'myorderservicesShow'])->name('myorderservices.show');
Route::get('/myorderservices/result/{order}', [HomeController::class, 'resultorderservicesUpload'])->name('myorderservices.result');
Route::post('/myorderservices/payment', [HomeController::class, 'paymentorderservice'])->name('myorderservices.payment');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('products', ProductController::class);
Route::resource('vouchers', VoucherController::class);
Route::resource('models', PhotoModelController::class);
Route::resource('photobackgrounds', PhotoBackgroundController::class);


Route::controller(OrderController::class)->group(function() {
Route::get('/orders', 'index')->name('orders');
Route::get('/myorders/{user_id}', 'myorders')->name('myorders');
Route::post('/orders/store', 'store')->name('orders.store');
Route::get('/myorders/show/{order}', 'show')->name('myorders.show');
Route::post('/myorders/payment', 'payment')->name('myorders.payment');
Route::get('/myorders/result/{order}', 'resultUpload')->name('myorders.result');
});

Route::get('/get-data-product', [ProductController::class, 'getDataProduct'])->name('get-data-product');
Route::get('/get-data-product-optional', [ProductController::class, 'getDataProductOptional'])->name('get-data-product-optional');

Route::get('/get-origins', [App\Http\Controllers\ShippingController::class, 'getOrigins']);
Route::get('/get-destinations', [App\Http\Controllers\ShippingController::class, 'getDestinations']);
Route::get('/calculate-shipping', [App\Http\Controllers\ShippingController::class, 'calculateShipping']);

Route::get('/clients', [CustomerController::class, 'index'])->name('clients');
Route::get('/orderupload/show/{order}', [AdminController::class, 'orderUpload'])->name('orderupload.show');

Route::get('/listorders', [AdminController::class, 'listOrders'])->name('listorders');
Route::get('/listorders/{id}', [PDFController::class, 'generatePDF']);
// Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('/report', [AdminController::class, 'report'])->name('report');
Route::get('/orders/print-shippping/{order}', [OrderController::class, 'printShipping'])->name('admin.print-shipping');
Route::get('/orders/print-order-today', [OrderController::class, 'orderDay'])->name('admin.orderday');

Route::post('/orderupload/store', [AdminController::class, 'store'])->name('orderupload.store');
Route::post('/orderupload/store_drive', [AdminController::class, 'store_drive'])->name('orderupload.store_drive');

Route::post('/check-voucher', [VoucherController::class, 'validateVoucher'])->name('validateVoucher');