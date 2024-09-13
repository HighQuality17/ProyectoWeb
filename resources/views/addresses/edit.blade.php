@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Editar Dirección</h2>

    <!-- Mostrar mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('addresses.update', $address->id) }}" method="POST" class="bg-white p-6 shadow-md rounded">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="department" class="block text-gray-700 font-bold">Departamento:</label>
            <input type="text" name="department" id="department" value="{{ old('department', $address->department) }}" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="city" class="block text-gray-700 font-bold">Ciudad:</label>
            <input type="text" name="city" id="city" value="{{ old('city', $address->city) }}" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="neighborhood" class="block text-gray-700 font-bold">Barrio:</label>
            <input type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood', $address->neighborhood) }}" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="address_line1" class="block text-gray-700 font-bold">Dirección 1:</label>
            <input type="text" name="address_line1" id="address_line1" value="{{ old('address_line1', $address->address_line1) }}" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="address_line2" class="block text-gray-700 font-bold">Dirección 2 (opcional):</label>
            <input type="text" name="address_line2" id="address_line2" value="{{ old('address_line2', $address->address_line2) }}" class="w-full px-3 py-2 border rounded">
        </div>

        <div class="flex justify-between items-center">
            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">Actualizar Dirección</button>
            <a href="{{ route('addresses.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
        </div>
        
    </form>
</div>
@endsection
