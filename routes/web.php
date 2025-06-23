<?php

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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');

Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', App\Http\Controllers\AdminProductController::class);
    Route::resource('orders', App\Http\Controllers\AdminOrderController::class)->only(['index']);
    Route::resource('users', App\Http\Controllers\AdminUserController::class)->only(['index']);
});

require __DIR__.'/auth.php';
