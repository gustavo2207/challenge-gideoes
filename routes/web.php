<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::redirect('/', '/client');

Route::get('/client/showBulkDelete', [ClientController::class, 'showBulkDelete'])->name('client.showBulkDelete');
Route::delete('/client/bulkDestroy', [ClientController::class, 'bulkDestroy'])->name('client.bulkDestroy');

Route::resource('/client', ClientController::class);

Route::get('/product/showBulkDelete', [ProductController::class, 'showBulkDelete'])->name('product.showBulkDelete');
Route::delete('/product/bulkDestroy', [ProductController::class, 'bulkDestroy'])->name('product.bulkDestroy');

Route::resource('/product', ProductController::class);

Route::get('/order/showBulkDelete', [OrderController::class, 'showBulkDelete'])->name('order.showBulkDelete');
Route::delete('/order/bulkDestroy', [OrderController::class, 'bulkDestroy'])->name('order.bulkDestroy');

Route::resource('/order', OrderController::class);
