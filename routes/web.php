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
use App\Http\Controllers\CartController;


// Página principal
// Route::get('/', function () {
//     return view('index');
// })->name('index');

// Autenticación
auth::routes();

// Rutas generales para usuarios autenticados
Route::middleware('auth')->group(function () {

    // Rutas RESTful protegidas por el middleware de administrador
    Route::middleware('checkrole:1')->group(function () {
        Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/show/{id}', [AdminController::class, 'showProduct'])->name('admin.products.show');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::patch('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
        
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

        //Rutas carrito de compras

        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');  // Mostrar carrito
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); //añadir al carrito
        Route::get('/cart/show', [CartController::class, 'showCart'])->name('cart.show'); //mostrar los productos del carrito
        Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove'); // Remover producto del carrito
        Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // Actualizar cantidad en el carrito
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
Route::get('/', [HomeController::class, 'show'])->name('home.show');

// Rutas para páginas estáticas
Route::get('/shop', [ProductController::class, 'shopList'])->name('products.shopList');
Route::get('/shop-single/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::view('/contact', 'contact')->name('contact');