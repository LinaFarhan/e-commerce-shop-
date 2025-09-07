<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StoreController;


 Route::get('/shop',[ShopController::class,'index']);

Route::get('/', [StoreController::class, 'index'])->name('shop.index');

Route::get('/products', [StoreController::class, 'products'])->name('shop.products');
Route::get('/products/{id}', [StoreController::class, 'productDetails'])->name('shop.productDetails');

Route::get('/cart', [StoreController::class, 'cart'])->name('shop.cart');

Route::get('/about-us', [StoreController::class, 'about'])->name('shop.about-us');

Route::get('/contact', [StoreController::class, 'contact'])->name('shop.contact');
Route::post('/contact', [StoreController::class, 'submitContact'])->name('shop.contact.submit');
