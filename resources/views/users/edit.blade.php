<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required>
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" required>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="idcard">Número de Identificación</label>
                <input type="text" name="idcard" class="form-control @error('idcard') is-invalid @enderror" value="{{ $user->idcard }}" required>
                @error('idcard')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" required>
                @error('phone')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Rol</label>
                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" required>
                    @foreach(\App\Models\Role::all() as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Desactivado</option>
                </select>
                @error('status')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <style>
                label {
                    font-weight: bold;
                }

                select.form-control {
                    background-image: url("data:image/svg+xml;charset=UTF-8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='black' width='24' height='24'><path d='M7 10l5 5 5-5z'/></svg>");
                    background-repeat: no-repeat;
                    background-position: center right;
                }

                .text-danger{
                    font-weight: bold;
                }
                
                .is-invalid {
                    border-color: #dc3545;
                }
            </style>
            <br>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
@endsection
