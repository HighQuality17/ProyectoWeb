@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Agregar Producto</h1>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="line">Línea</label>
                    <input type="text" name="line" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="weight">Peso</label>
                    <input type="number" name="weight" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="guarantee">Garantía</label>
                    <input type="number" name="guarantee" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="brand">Marca</label>
                    <input type="text" name="brand" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="size">Talla</label>
                    <input type="number" name="size" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" name="image" class="form-control">
                </div><br>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            <br>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">Volver al panel de gestión</a>
        </div>
    </div>
</div>
@endsection
