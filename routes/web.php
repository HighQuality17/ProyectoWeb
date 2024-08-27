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
// Rutas para productos
Route::get('/Products',[ProductController::class,'index'])->name('products.index');
Route::get('/Products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/Products',[ProductController::class,'store'])->name('products.store');
Route::get('/Products/{product}',[ProductController::class,'show'])->name('products.show');
Route::get('/Products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::put('/Products/{product}',[ProductController::class,'update'])->name('products.update');
Route::delete('/Products/{product}',[ProductController::class,'destroy'])->name('products.destroy');

// Rutas para usuarios
Route::get('/Users',[UsersController::class,'index'])->name('users.index');
Route::get('/Users/create',[UsersController::class,'create'])->name('users.create');
Route::post('/Users',[UsersController::class,'store'])->name('users.store');
Route::get('/Users/{user}',[UsersController::class,'show'])->name('users.show');
Route::get('/Users/{user}/edit',[UsersController::class,'edit'])->name('users.edit');
Route::put('/Users/{user}',[UsersController::class,'update'])->name('users.update');
Route::delete('/Users/{user}',[UsersController::class,'destroy'])->name('users.destroy');

