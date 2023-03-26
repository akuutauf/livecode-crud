<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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


// manajemen produk
Route::get('/', [ProductController::class, 'index'])->name('index.product');
Route::get('/product/add', [ProductController::class, 'create'])->name('create.product');
Route::post('/product/store', [ProductController::class, 'store'])->name('store.product');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('edit.product');
Route::get('/product/{id}/delete', [ProductController::class, 'destroy'])->name('delete.product');

// kalau menggunakan put maka di from update berikan method PUT
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('update.product');

// manajemen kategori
Route::get('/category-index', [CategoryController::class, 'index'])->name('index.category');
Route::get('/category/add', [CategoryController::class, 'create'])->name('create.category');
Route::post('/category/store', [CategoryController::class, 'store'])->name('store.category');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('edit.category');
Route::get('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('delete.category');

// kalau menggunakan put maka di from update berikan method PUT
Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('update.category');

// manajemen cart
Route::get('/cart-index', [CartController::class, 'index'])->name('index.cart');
Route::get('/cart/add', [CartController::class, 'create'])->name('create.cart');
Route::post('/cart/store', [CartController::class, 'store'])->name('store.cart');
Route::get('/cart/{id}/edit', [CartController::class, 'edit'])->name('edit.cart');
Route::get('/cart/{id}/delete', [CartController::class, 'destroy'])->name('delete.cart');

// kalau menggunakan put maka di from update berikan method PUT
Route::put('/cart/{id}/update', [CartController::class, 'update'])->name('update.cart');
