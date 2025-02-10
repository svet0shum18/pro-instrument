<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');
Route::get('/home', [ProductController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ProductController::class, 'index']);
Route::get('/search', [ProductController::class, 'search'])->name('search');


Route::get('/category/{id}', [ProductController::class, 'showProductsByCategory'])->name('category.products');
Route::get('/brand/{id}', [ProductController::class, 'showProductsByBrand'])->name('brand.products');


Route::middleware(['auth'])->group(function () {
	Route::post('/add-to-cart', [CartController::class, 'addToCart']);
	Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
	Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
	Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});

require __DIR__.'/auth.php';
