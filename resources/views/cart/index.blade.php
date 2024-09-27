@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="cart-container p-4 bg-light rounded shadow-sm">
        <h2 class="text-center mb-4">Carrito de Compras</h2>

        @if (session('cart') && count(session('cart')) > 0)
            <table class="table table-borderless">
                <thead class="border-bottom">
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th>Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-end">Precio</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('cart') as $id => $details)
                        <tr class="align-middle">
                            <td class="text-center">
                                <img src="{{ asset('images/' . $details['image']) }}" class="img-fluid" width="50" height="50">
                            </td>
                            <td>{{ $details['name'] }}</td>
                            <td class="text-center">{{ $details['quantity'] }}</td>
                            <td class="text-end">COP {{ number_format($details['price'], 0, ',', '.') }}</td>
                            <td class="text-end">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row cart-summary mt-4">
                <div class="col-md-9 text-end">
                    <h4>Total: COP {{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart'))), 0, ',', '.') }}</h4>
                </div>
                <div class="col-md-3 text-end">
                    <button class="btn btn-success btn-lg">Pagar</button>
                </div>
            </div>
        @else
            <p class="text-center">No hay productos en el carrito</p>
        @endif
    </div>
</div>
@endsection
