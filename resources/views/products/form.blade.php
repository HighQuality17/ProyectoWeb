@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($product) ? 'Editar Producto' : 'Crear Producto' }}</h1>
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="product_name">Nombre del Producto</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->name ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="product_price">Precio del Producto</label>
            <input type="number" class="form-control" id="product_price" name="product_price" value="{{ $product->price ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="product_stock">Stock del Producto</label>
            <input type="number" class="form-control" id="product_stock" name="product_stock" value="{{ $product->stock ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Actualizar' : 'Crear' }}</button>
    </form>
</div>
@endsection
