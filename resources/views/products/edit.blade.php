@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <!-- Campos del formulario aquí -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="line" class="form-label">Linea</label>
                <input type="text" name="line" class="form-control" id="line" value="{{ old('line', $product->line) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control" id="description" required>{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Peso</label>
                <input type="number" name="weight" class="form-control" id="weight" value="{{ old('weight', $product->weight) }}" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock', $product->stock) }}" required>
            </div>
            <div class="mb-3">
                <label for="guarantee" class="form-label">Garantía</label>
                <input type="text" name="guarantee" class="form-control" id="guarantee" value="{{ old('guarantee', $product->guarantee) }}" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Marca</label>
                <input type="text" name="brand" class="form-control" id="brand" value="{{ old('brand', $product->brand) }}" required>
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Talla</label>
                <input type="number" name="size" class="form-control" id="size" value="{{ old('size', $product->size) }}" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" class="form-control" id="color" value="{{ old('color', $product->color) }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen</label>
                <input type="file" name="image" class="form-control" id="image">
                
                @if($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail mt-2" style="width: 150px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
