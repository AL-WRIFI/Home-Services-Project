<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/home', function () {
    return view('index');
});

Route::resource('categories', CategoryController::class);
Route::resource('services', ServiceController::class);
Route::resource('providers', ProviderController::class);
Route::resource('orders', OrderController::class);
Route::any('status_update/{id}', [ProviderController::class,'status_update'])->name('status_update');
//Route::get('categories/list', [CategoryController::class, 'index']);
//Route::get('categories/create', [CategoryController::class, 'create']);

