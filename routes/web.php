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

Route::get('/', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::get('/search', [OrderController::class, 'search']);
Route::get('/search', [OrderController::class, 'search']);
Route::delete('/order/{id}', [OrderController::class, 'destroy']);
Route::post('/order/store', [OrderController::class, 'store']);

