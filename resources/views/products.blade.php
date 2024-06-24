<!-- resources/views/products.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <!-- Aquí puedes listar los productos, por ejemplo -->
    @foreach($products as $product)
        <div class="product">
            <h2>{{ $product->name }}</h2>
            <p>Precio: {{ $product->price }}</p>
            <p>Stock: {{ $product->stock }}</p>
        </div>
    @endforeach
</div>
@endsection
