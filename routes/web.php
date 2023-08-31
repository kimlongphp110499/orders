<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/detail/{id}', [OrderController::class, 'show'])->name('show');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::delete('/{id}', [OrderController::class, 'destroy'])->name('destroy');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::post('{id}/update-shipping-status', [OrderController::class, 'updateShippingStatus'])->name('update-shipping-status');
    Route::get('/review/{id}', [OrderController::class, 'review'])->name('review');
    Route::post('/review/store/{id}', [OrderController::class, 'reviewStore'])->name('review.store');
});



