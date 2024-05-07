<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderStateController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\StorageProductController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\Controller;
use App\Http\Middleware\VerifyAdminRole;
use App\Http\Middleware\VerifyUserRole;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\CartController;

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

Route::get('/cart', [CartController::class, 'Cart'])->name('cart');
Route::get('/cart/add/{id}',[CartController::class, 'addProductToCart'])->name('addProductToCart');
Route::patch('/cart/update',[CartController::class, 'updateCart'])->name('updateCart');
Route::delete('/cart/remove',[CartController::class, 'deleteProduct'])->name('deleteProduct');

Route::middleware(Authenticate::class)->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Orders Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/orderstates', OrderStateController::class)->middleware(VerifyAdminRole::class);
    Route::get('/orderstates/show_deleted', [OrderStateController::class, 'show_deleted'])->name('orderstates.show_deleted')->middleware(VerifyAdminRole::class);

    /*
    |--------------------------------------------------------------------------
    | Orders Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/orders', OrderController::class);
    Route::get('/orders/show_deleted', [OrderController::class, 'show_deleted'])->name('orders.show_deleted')->middleware(VerifyAdminRole::class);

    /*
    |--------------------------------------------------------------------------
    | Orders Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/producttypes', ProductTypeController::class)->middleware(VerifyAdminRole::class);;
    Route::get('/producttypes/show_deleted', [ProductTypeController::class, 'show_deleted'])->name('producttypes.show_deleted')->middleware(VerifyAdminRole::class);

    /*
    |--------------------------------------------------------------------------
    | Products Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/products', ProductController::class)->middleware(VerifyUserRole::class);
    Route::get('/products/show_deleted', [ProductController::class, 'show_deleted'])->name('products.show_deleted')->middleware(VerifyAdminRole::class);

    /*
    |--------------------------------------------------------------------------
    | Publishers Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/publishers', PublisherController::class)->middleware(VerifyAdminRole::class);
    Route::get('/publishers/show_deleted', [PublisherController::class, 'show_deleted'])->name('publishers.show_deleted')->middleware(VerifyUsVerifyAdminRoleerRole::class);
    
    /*
    |--------------------------------------------------------------------------
    | Platforms Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/platforms', PlatformController::class)->middleware(VerifyAdminRole::class);
    Route::get('/platforms/show_deleted', [PlatformController::class, 'show_deleted'])->name('platforms.show_deleted')->middleware(VerifyAdminRole::class);

    /*
    |--------------------------------------------------------------------------
    | Storages Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/storages', StorageController::class)->middleware(VerifyUserRole::class);
    Route::get('/storages/show_deleted', [StorageController::class, 'show_deleted'])->name('storages.show_deleted')->middleware(VerifyAdminRole::class);

    /*
    |--------------------------------------------------------------------------
    | StorageProducts Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/storageproducts', StorageProductController::class)->middleware(VerifyUserRole::class);
    Route::get('/storageproducts/show_deleted', [StorageProductController::class, 'show_deleted'])->name('storageproducts.show_deleted')->middleware(VerifyAdminRole::class);

    /*
    |--------------------------------------------------------------------------
    | Contracts Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('/contracts', ContractController::class)->middleware(VerifyAdminRole::class);
    Route::get('/contracts/show_deleted', [ContractController::class, 'show_deleted'])->name('contracts.show_deleted')->middleware(VerifyAdminRole::class);

});

