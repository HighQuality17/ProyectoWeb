<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;

// Ruta para registrar usuarios (store method)
Route::post('/registro_usuarios', [UsersController::class, 'store']);

// Ruta para la página principal
Route::get('/', function () {
    return view('index');
});

// Rutas RESTful para productos
Route::resource('products', ProductController::class);

// Rutas RESTful para usuarios
Route::resource('users', UsersController::class);

// Autenticación
Auth::routes();

// Ruta para el dashboard después de iniciar sesión
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas para páginas estáticas
Route::view('/shop', 'shop')->name('shop');
Route::view('/shop-single', 'shop-single')->name('shop.single');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

