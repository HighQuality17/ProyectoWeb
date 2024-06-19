<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')  

@section('content')
    
    <div class="container">
        <h1 class="text-center mb-4">Lista de Productos</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
