@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Pedidos</h1>

    @if($sales && $sales->isNotEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha de Venta</th>
                    <th>Monto Total</th>
                    <th>Fecha de Envío</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->sale_date }}</td>
                        <td>${{ number_format($sale->total_amount, 2) }}</td>
                        <td>{{ $sale->dispatch_date }}</td>
                        <td>
                            <!-- Botones para ver o editar la venta (puedes agregar más acciones si lo deseas) -->
                            <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tienes pedidos realizados.</p>
    @endif
</div>
@endsection