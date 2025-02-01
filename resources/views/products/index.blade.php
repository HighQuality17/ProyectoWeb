@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Productos</h1>
        @if(Auth::user()->role_id === 3)
            <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Producto</a>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->provider->name }}</td>
                        <td>
                            @if(Auth::user()->role_id === 1)
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">Ver</a>
                            @else
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Ver</a>
                            @endif
                            @if(Auth::user()->role_id === 3)
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(Auth::user()->role_id === 1)
            <a href="{{ route('admin.home') }}" class="btn btn-secondary mb-3">Volver al panel de gestion</a>
        @else
            <a href="{{ route('provider.home') }}" class="btn btn-secondary mb-3">Volver al panel de gestion</a>
        @endif
    </div>
@endsection
