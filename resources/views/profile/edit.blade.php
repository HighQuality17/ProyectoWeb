<!-- resources/views/profile/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Información Personal</h1>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', Auth::user()->name) }}" required autofocus />
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required />
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone', Auth::user()->phone) }}" />
            @error('phone')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Guardar</button>

            <a href="{{ route('home') }}" class="btn btn-secondary">Volver a tu perfil</a>
        </div>

        @if (session('status') === 'profile-updated')
            <div class="text-success mt-3">
                {{ __('Perfil actualizado.') }}
            </div>
        @endif
    </form>
</div>
@endsection
