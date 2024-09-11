<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SalesController;

// Ruta para registrar usuarios (store method)
Route::post('/registro_usuarios', [UsersController::class, 'store']);

// Ruta para la página principal
Route::get('/', function () {
    return view('index');
});

// Rutas RESTful para productos y usuarios
Route::resource('products', ProductController::class);

Route::resource('users', UsersController::class);

Route::resource('addresses', AddressController::class);

Route::resource('sales', SalesController::class);

// Autenticación
Auth::routes();
route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');

// Ruta para el dashboard después de iniciar sesión
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Ruta para la vista de perfil de usuario
route::get('/home', [UserProfileController::class, 'home'])->name('home');

// Rutas para páginas estáticas
Route::view('/shop', 'shop')->name('shop');
Route::view('/shop-single', 'shop-single')->name('shop.single');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

