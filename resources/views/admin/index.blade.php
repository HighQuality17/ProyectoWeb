@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5 display-4">Panel de Administración</h1>

    <div class="row">
        <!-- Panel de Gestión de Productos -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title h4">Gestión de Productos</h2>
                    <p class="card-text">Administra los productos disponibles en la tienda.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-success">Ver Productos</a>
                    {{-- <a href="{{ route('products.create') }}" class="btn btn-success ml-2">Añadir Producto</a> --}}
                </div>
            </div>
        </div>
        
        <!-- Panel de Gestión de Usuarios -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title h4">Gestión de Usuarios</h2>
                    <p class="card-text">Administra los usuarios del sistema.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-success">Ver Usuarios</a>
                    <a href="{{ route('users.create') }}" class="btn btn-success ml-2">Añadir Usuario</a>
                </div>
            </div>
        </div>
        
        <!-- Panel de Generación de Reportes -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title h4">Generación de Reportes</h2>
                    <p class="card-text">Genera reportes detallados sobre ventas y productos.</p>
                    <a href="{{ route('reports.sales_pdf') }}" class="btn btn-success">Reporte de Ventas</a>
                    <a href="{{ route('reports.products_pdf') }}" class="btn btn-success">Reporte de Productos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
