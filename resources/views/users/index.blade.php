<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-success">Crear Usuario</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>No. ID</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            @if ($user->status == 1)
                                Activo
                            @else
                                <span style="color:red">
                                Desactivado
                                </span>
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->idcard }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role_id ? \App\Models\Role::find($user->role_id)->name : 'N/A' }}
                        </td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
