<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BrandController;





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

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register', [App\Http\Controllers\UserController::class, 'create'])->name('register');
Route::post('register', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('login', [App\Http\Controllers\UserController::class, 'login'])->name('login');

Route::get('/', [ProductController::class, 'index']);
Route::get('/search', [ProductController::class, 'search'])->name('search');


//Route::post('/cart/add', [CartController::class, 'addToCart']);
//Route::get('/cart/show', [CartController::class, 'showCart']);
//Route::post('/cart/remove', [CartController::class, 'removeFromCart']);
//Route::post('/cart/clear', [CartController::class, 'clearCart']);
//Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

//Route::get('/', [ProductController::class, 'index'])->name('products.index');
//Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
//Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
//Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
//Route::get('/checkout', [CartController::class, 'checkoutView'])->name('cart.checkout');
//Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('order.place');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/category/{id}', [ProductController::class, 'showProductsByCategory'])->name('category.products');
Route::get('/brand/{id}', [ProductController::class, 'showProductsByBrand'])->name('brand.products');


