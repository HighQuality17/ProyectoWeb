@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Información Personal</h1>

    <!-- Mostrar mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

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
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('profile.home') }}" class="btn btn-secondary">Volver a tu perfil</a>
        </div>
    </form>
</div>
@endsection
