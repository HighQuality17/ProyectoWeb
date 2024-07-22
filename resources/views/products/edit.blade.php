<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="line" class="form-label">Linea</label>
                <input type="text" step="0.01" name="line" class="form-control" id="line" value="{{ $product->line}}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ $product->stock }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}" required>
            </div>
            <div class="mb-3">
                <label for="peso" class="form-label">Peso</label>
                <input type="number" name="peso" class="form-control" id="peso" value="{{ $product->weight }}" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ $product->stock }}" required>
            </div>
            <div class="mb-3">
                <label for="guarantee" class="form-label">Garantia</label>
                <input type="number" name="guarantee" class="form-control" id="guarantee" value="{{ $product->guarantee }}" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Marca</label>
                <input type="text" name="brand" class="form-control" id="brand" value="{{ $product->brand }}" required>
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Talla</label>
                <input type="number" name="size" class="form-control" id="size" value="{{ $product->size }}" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" class="form-control" id="color" value="{{ $product->color }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
