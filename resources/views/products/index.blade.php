@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Producto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
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
                        <td>
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">Ver</a>
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
        @elseif(Auth::user()->role_id === 3)
            <a href="{{ route('provider.home') }}" class="btn btn-secondary mb-3">Volver al panel de gestion</a>
        @endif
    </div>
@endsection

@section('content')
    <button onclick="fetchProducts()">Cargar Productos</button>
    <div id="products"></div>

    <script>
        function fetchProducts() {
            fetch('http://127.0.0.1:8000/api/products')
                .then(response => response.json())
                .then(data => {
                    const productsDiv = document.getElementById('products');
                    productsDiv.innerHTML = '';
                    data.forEach(product => {
                        productsDiv.innerHTML += `<p>${product.name} - $${product.price}</p>`;
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    
   


@endsection