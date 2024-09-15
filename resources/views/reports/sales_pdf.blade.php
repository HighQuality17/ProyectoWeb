@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Reporte de Ventas</h2>

    @if($sales->isEmpty())
        <p>No hay ventas registradas.</p>
    @else
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">ID</th>
                    <th class="py-2">Fecha de Venta</th>
                    <th class="py-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td class="py-2">{{ $sale->id }}</td>
                        <td class="py-2">{{ $sale->sale_date }}</td>
                        <td class="py-2">${{ $sale->total_amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
