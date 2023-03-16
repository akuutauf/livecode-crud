<?php

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
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('update.product'); // kalau menggunakan put maka di from update berikan method PUT
Route::get('/product/{id}/delete', [ProductController::class, 'destroy'])->name('delete.product');

// 07.30 - 09.00 (delete)
