@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Mi Perfil</h2>

    <div class="row">
        <!-- Información del usuario -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Información Personal
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
                        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                        <li><strong>Teléfono:</strong> {{ Auth::user()->phone ?? 'No proporcionado' }}</li>
                    </ul>
                    <a href="{{ route('profile.edit') }}" class="btn btn-success mt-3">Editar Información</a>
                </div>
            </div>
        </div>

        <!-- Direcciones del usuario -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Mis Direcciones
                </div>
                <div class="card-body">
                    @if ($addresses->isEmpty())
                        <p>No tienes direcciones registradas.</p>
                        <a href="{{ route('addresses.create') }}" class="btn btn-success">Añadir nueva dirección</a>
                    @else
                        <ul class="list-group">
                            @foreach ($addresses as $address)
                                <li class="list-group-item">
                                    <strong>Departamento:</strong> {{ $address->department }}<br>
                                    <strong>Ciudad:</strong> {{ $address->city }}<br>
                                    <strong>Barrio:</strong> {{ $address->neighborhood }}<br>
                                    <strong>Dirección 1:</strong> {{ $address->address_line1 }}<br>
                                    <strong>Dirección 2:</strong> {{ $address->address_line2 ?? '-' }}<br>
                                    <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-success btn-sm mt-2">Editar</a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('addresses.create') }}" class="btn btn-success mt-3">Añadir nueva dirección</a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Pedidos del usuario -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Mis Pedidos
                </div>
                <div class="card-body">
                    @if ($sales->isEmpty())
                        <p>No tienes pedidos realizados.</p>
                        <a href="{{ route('sales.index') }}" class="btn btn-success">Ver productos</a>
                    @else
                        <ul class="list-group">
                            @foreach ($sales as $sale)
                                <li class="list-group-item">
                                    <strong>ID del Pedido:</strong> {{ $sale->id }}<br>
                                    <strong>Fecha:</strong> {{ $sale->created_at->format('d/m/Y') }}<br>
                                    <strong>Total:</strong> ${{ number_format($sale->total, 2) }}<br>
                                    <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-success btn-sm mt-2">Ver Detalles</a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('sales.index') }}" class="btn btn-success mt-3">Ver todos los pedidos</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
