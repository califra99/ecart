<?php

use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('products', [ProductsController::class, 'index'])->name('products.index');

    Route::get('your-cart', [CartsController::class, 'show'])->name('cart.show');
    Route::post('checkout', [CartsController::class, 'checkout'])->name('cart.checkout');
    Route::get('success', [CartsController::class, 'success'])->name('checkout.success')->middleware('stripe');

    Route::post('carts/{product}/add', [CartItemsController::class, 'store'])->name('cartitem.store');
    Route::delete('carts/{product}/remove', [CartItemsController::class, 'destroy'])->name('cartitem.destroy');

    Route::post('coupons/apply/{product}', [CouponsController::class, 'apply'])->name('coupons.apply');

    Route::get('your-orders', [OrdersController::class, 'index'])->name('orders.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
