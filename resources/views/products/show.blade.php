<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Detalles del Producto</h1>
            <div class="form-group">
                <label>Nombre:</label>
                <p>{{ $product->name }}</p>
            </div>
            <div class="form-group">
                <label>Precio:</label>
                <p>{{ $product->price }}</p>
            </div>
            <div class="form-group">
                <label>Stock:</label>
                <p>{{ $product->stock }}</p>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
