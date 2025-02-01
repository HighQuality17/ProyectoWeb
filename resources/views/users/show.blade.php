<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Usuario</h1>

        <div class="card">
            <div class="card-header">
                Información del Usuario
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>{{ App\Models\Role::find($user->role_id)->name === 'Proveedor' ? 'NIT / RUT:' : 'Cedula:' }}</strong> {{ $user->idcard }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $user->phone }}</p>
                <p class="card-text"><strong>Rol:</strong> {{ $user->role_id ? \App\Models\Role::find($user->role_id)->name : 'N/A' }}</p>
                <p class="card-text"><strong>Fecha de Creación:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">Eliminar</button>
                </form>
            </div>
        </div>

        <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
    </div>
@endsection
