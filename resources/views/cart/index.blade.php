@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="cart-container p-4 bg-light rounded shadow-sm">
        <h2 class="text-center mb-4">Carrito de Compras</h2>

        @if ($cartItems->count() > 0)
            <table class="table table-borderless">
                <thead class="border-bottom">
                    <tr>
                        <th class="text-center"></th>
                        <th>Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-end">Precio</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr class="align-middle">
                            <td class="text-center">
                            <img src="{{ asset('images/' . $cartItem->image) }}" class="img-fluid" style="max-width: 100px; height: auto;">
                            </td>
                            <td>{{ $cartItem->name }}</td>
                            <td class="text-center">{{ $cartItem->quantity }}</td>
                            <td class="text-end">COP {{ number_format($cartItem->price, 0, ',', '.') }}</td>
                            <td class="text-end">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $cartItem->product_id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row cart-summary mt-4">
                <div class="col-md-9 text-end">
                    <h4>Total: COP {{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 0, ',', '.') }}</h4>
                </div>
                <div class="col-md-3 text-end">
                    <button class="btn btn-success btn-lg">Pagar</button>
                </div>
            </div>
        @else
            <p class="text-center">No hay productos en el carrito</p>
        @endif
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver al inicio</a>
        <a href="{{ route('products.shopList') }}" class="btn btn-success">Ver más productos</a>
    </div>
</div>
@endsection
