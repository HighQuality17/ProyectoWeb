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
                <label>Línea:</label>
                <p>{{ $product->line }}</p>
            </div>

            <div class="form-group">
                <label>Descripción:</label>
                <p>{{ $product->description }}</p>
            </div>

            <div class="form-group">
                <label>Precio:</label>
                <p>{{ $product->price }}</p>
            </div>

            <div class="form-group">
                <label>Peso:</label>
                <p>{{ $product->weight }} kg</p>
            </div>

            <div class="form-group">
                <label>Stock:</label>
                <p>{{ $product->stock }}</p>
            </div>

            <div class="form-group">
                <label>Garantía:</label>
                <p>{{ $product->guarantee }}</p>
            </div>

            <div class="form-group">
                <label>Marca:</label>
                <p>{{ $product->brand }}</p>
            </div>

            <div class="form-group">
                <label>Tamaño:</label>
                <p>{{ $product->size }}</p>
            </div>

            <div class="form-group">
                <label>Color:</label>
                <p>{{ $product->color }}</p>
            </div>

            <a href="{{ route('products.index') }}" class="btn btn-success">Volver</a>
        </div>
    </div>
</div>
@endsection
