<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;

Route::post('/registro_usuarios', UsersController::class, 'store');

Route::get('/', function () {
    
    return view('index');
});



Route::resource('products', ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/shop', function () {
    return view('shop');
});

Route::get('/shop-single', function () {
    return view('shop-single');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/welcome', function () {
    return view('welcome');
});


