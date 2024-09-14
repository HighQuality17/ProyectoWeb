<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;

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

// Ruta para el dashboard 
Route::get('/home', [HomeController::class, 'index'])->name('index');

// ruta para el rol de Cliente
Route::middleware(['checkrole:2'])->group(function () {
    Route::get('/profile/home', [ClientController::class, 'home'])->name('profile.home');
    
});
// Rutas para Clientes
Route::middleware(['cliente'])->group(function () {
    route::get('/profile/home', [UserProfileController::class, 'home'])->name('profile.home');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::resource('addresses', AddressController::class);
});

// ruta para el rol de Administrador
Route::middleware(['checkrole:1'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'home'])->name('admin.index');
});

// rutas para el reporte de ventas
Route::get('/report/sales/pdf', [ReportController::class, 'generateSalesReportPDF']);
Route::get('/report/products/pdf', [ReportController::class, 'generateProductReportPDF']);

// Rutas para páginas estáticas
Route::view('/shop', 'shop')->name('shop');
Route::view('/shop-single', 'shop-single')->name('shop.single');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');



