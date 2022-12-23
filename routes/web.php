<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProviderController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Order;
use App\Http\livewire\ShowService;
use App\Http\Controllers\ProfileController;
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
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categories', CategoryController::class);
Route::resource('services', ServiceController::class);
Route::resource('providers', ProviderController::class);
Route::resource('orders', OrderController::class);
Route::any('status_update/{id}', [ProviderController::class,'status_update'])->name('status_update');
//Route::get('categories/list', [CategoryController::class, 'index']);
//Route::get('categories/create', [CategoryController::class, 'create']);

// Route::get('/var', function () {
//     return view('index');
// });

//Route::get('/services/{category_id}/edit', ShowService::class)->name('services');
//Route::get('/cvar/{id}', ShowService::class);
//Route::get('/services/{id}', App\Http\Livewire\ShowService::class);
//Route::get('/home', Home::class);
Route::get('/category/{category_id}/show_services', App\Http\Livewire\Order::class)->name('show_services');
Route::get('/home', App\Http\Livewire\Home::class);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('dashboard', [DashboardController::class, 'index']);
//     Route::any('logout', [DashboardController::class, 'logout']);

//     //category Controller routes
//     Route::controller(CategoryController::class)->group(function () {
//         Route::get('category', 'index');
//         Route::get('category/create', 'create');
//         Route::post('category/store', 'store');
//         Route::get('category/{category}/edit', 'edit');
//         Route::post('category/{category}/update', 'update');
//         Route::any('category/{category}/delete', 'delete');
//     });

//     //routes for brands livewire
//     Route::get('brands', App\Http\Livewire\Admin\Brand\Index::class);

//     //admin backend products routes
//     Route::controller(ProductController::class)->group(function () {
//         Route::get('products', 'index');
//         Route::get('products/create', 'create');
//         Route::post('products/store', 'store');
//         Route::get('products/{products}/edit', 'edit');
//         Route::post('products/{products}/update', 'update');
//         Route::any('products/{products}/delete', 'delete');
//     });
// });

require __DIR__.'/auth.php';
