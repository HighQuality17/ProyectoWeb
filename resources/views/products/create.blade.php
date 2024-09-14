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
                    <label for="product_linea">Linea</label>
                    <input type="text" name="product_line" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_description">Descripcion</label>
                    <input type="text" name="product_description" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_price">Precio</label>
                    <input type="number" name="product_price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_weight">Peso</label>
                    <input type="number" name="product_weight" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_stock">Stock</label>
                    <input type="number" name="product_stock" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_guarantee">Garantia</label>
                    <input type="number" name="product_guarantee" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_brand">Marca</label>
                    <input type="text" name="product_brand" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_size">Talla</label>
                    <input type="number" name="product_size" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_color">Color</label>
                    <input type="text" name="product_color" class="form-control" required>
                </div><br>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            <br>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">Volver al panel de gestion</a>
        </div>
    </div>
</div>
@endsection
