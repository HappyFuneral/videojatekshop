<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\StorageProductController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\Controller;
use App\Http\Middleware\VerifyUserRole;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');




Route::middleware(Authenticate::class)->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Orders Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/orders', OrderController::class);
    Route::get('/orders/show_deleted', [OrderController::class, 'show_deleted'])->name('orders.show_deleted')->middleware(VerifyUserRole::class);

    /*
    |--------------------------------------------------------------------------
    | Products Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/products', ProductController::class);
    Route::get('/products/show_deleted', [ProductController::class, 'show_deleted'])->name('products.show_deleted')->middleware(VerifyUserRole::class);

    /*
    |--------------------------------------------------------------------------
    | Publishers Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/publishers', PublisherController::class)->middleware(VerifyUserRole::class);
    Route::get('/publishers/show_deleted', [PublisherController::class, 'show_deleted'])->name('publishers.show_deleted')->middleware(VerifyUserRole::class);
    
    /*
    |--------------------------------------------------------------------------
    | Storages Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/storages', StorageController::class)->middleware(VerifyUserRole::class);

    /*
    |--------------------------------------------------------------------------
    | StorageProducts Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/storageproducts', StorageProductController::class)->middleware(VerifyUserRole::class);

    /*
    |--------------------------------------------------------------------------
    | Contracts Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/contracts', ContractController::class)->middleware(VerifyUserRole::class);

});

