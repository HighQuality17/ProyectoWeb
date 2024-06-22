<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Agregar Producto</h1>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product_name">Nombre</label>
                    <input type="text" name="product_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_price">Precio</label>
                    <input type="number" name="product_price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_stock">Stock</label>
                    <input type="number" name="product_stock" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
