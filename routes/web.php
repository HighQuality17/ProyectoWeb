<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ContactController;

// Página principal
Route::get('/', function () {
    return view('index');
})->name('index');

// Autenticación
auth::routes();

// Rutas generales para usuarios autenticados
Route::middleware('auth')->group(function () {

    // Rutas RESTful protegidas por el middleware de administrador
    Route::middleware('checkrole:1')->group(function () {
        Route::resources([
            'products' => ProductController::class,
        ]);
        
        // Rutas específicas del administrador
        Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    });

    // Rutas RESTful para otros recursos
    Route::resources([
        'users'    => UsersController::class,
        'addresses' => AddressController::class,
        'sales'    => SalesController::class,
    ]);

    // Rutas para el rol Cliente
    Route::middleware('checkrole:2')->group(function () {
        Route::get('/profile/home', [UserProfileController::class, 'home'])->name('profile.home');
        Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    });

    // Rutas para generar reportes
    Route::prefix('report')->group(function () {
        Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
        Route::post('reports/generate', [ReportController::class, 'generate'])->name('reports.generate');
        Route::get('/sales/pdf', [ReportController::class, 'generateSalesReportPDF'])->name('reports.sales_pdf');
        Route::get('/products/pdf', [ReportController::class, 'generateProductReportPDF'])->name('reports.products_pdf');
    });
});

// Ruta para mostrar el mapa
Route::get('/contact', [MapController::class, 'contact'])->name('contact');
// Ruta para enviar el formulario de contacto
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

//ruta detalles de productos
Route::get('/', [HomeController::class, 'show'])->name('products');

// Rutas para páginas estáticas
Route::view('/shop', 'shop')->name('shop');
Route::view('/shop-single', 'shop-single')->name('shop.single');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

