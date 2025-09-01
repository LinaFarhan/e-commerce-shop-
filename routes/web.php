<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::get('/', function () {//ترجع بيانات
    return view('welcome');//view يروح على مجلد resources -views-welcome
});

 Route::get('/shop',[ShopController::class,'index']);
