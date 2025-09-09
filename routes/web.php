<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;

 Route::get('/shop',[ShopController::class,'index']);

Route::get('/', [StoreController::class, 'index'])->name('shop.index');

Route::get('/products', [StoreController::class, 'products'])->name('shop.products');
Route::get('/products/{id}', [StoreController::class, 'productDetails'])->name('shop.productDetails');

Route::get('/cart', [StoreController::class, 'cart'])->name('shop.cart');

Route::get('/about-us', [StoreController::class, 'about'])->name('shop.about-us');

Route::get('/contact', [StoreController::class, 'contact'])->name('shop.contact');
Route::post('/contact', [StoreController::class, 'submitContact'])->name('shop.contact.submit');


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');



Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
