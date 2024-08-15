<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminProductController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store')->middleware('auth');
Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create')->middleware('auth');
Route::post('/admin/store-product', [ProductController::class, 'store'])->name('admin.store.product');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Auth::routes();

