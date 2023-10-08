<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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
    return Redirect::route('index_product');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/product', [ProductController::class, 'index'])->name('index_product');

Route::middleware('admin')->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('create_product');
    Route::post('/product/store', [ProductController::class, 'store'])->name('store_product');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('edit_product');
    Route::patch('/product/update/{product}', [ProductController::class, 'update'])->name('update_product');
    Route::post('/order/confirm/{order}', [OrderController::class, 'confirmPayment'])->name('confirm_payment');
});

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('show_profile');
    Route::post('/profile/edit', [ProfileController::class, 'editProfile'])->name('edit_profile');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('show_product');
    Route::delete('product/delete/{product}', [ProductController::class, 'delete'])->name('delete_product');
    Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('add_to_cart');
    Route::get('/cart', [CartController::class, 'showCart'])->name('show_cart');
    Route::patch('/cart/{cart}', [CartController::class, 'updateCart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'deleteCart'])->name('delete_cart');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order', [OrderController::class, 'index'])->name('index_order');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('show_order');
    Route::post('/order/pay/{order}', [OrderController::class, 'submitPaymentReceipt'])->name('submit_payment_receipt');
});

require __DIR__ . '/auth.php';
