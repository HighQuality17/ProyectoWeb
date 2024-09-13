@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Mis Direcciones</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($addresses->isEmpty())
        <p class="text-gray-500">No tienes direcciones registradas.</p>
        <a href="{{ route('addresses.create') }}" class="text-blue-500 hover:underline">Añadir nueva dirección</a>
    @else
        <table class="min-w-full bg-white shadow-md rounded mb-4">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Departamento</th>
                    <th class="py-2 px-4 border-b">Ciudad</th>
                    <th class="py-2 px-4 border-b">Barrio</th>
                    <th class="py-2 px-4 border-b">Dirección 1</th>
                    <th class="py-2 px-4 border-b">Dirección 2</th>
                    <th class="py-2 px-4 border-b text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $address->department }}</td>
                        <td class="py-2 px-4 border-b">{{ $address->city }}</td>
                        <td class="py-2 px-4 border-b">{{ $address->neighborhood }}</td>
                        <td class="py-2 px-4 border-b">{{ $address->address_line1 }}</td>
                        <td class="py-2 px-4 border-b">{{ $address->address_line2 ?? '-' }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{ route('addresses.edit', $address->id) }}" class="text-blue-500 hover:underline mr-2">Editar</a>
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que deseas eliminar esta dirección?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('addresses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Añadir nueva dirección</a>
    @endif

    <div class="mt-4">
        <a href="{{ route('profile.home') }}" class="btn btn-secondary">Volver a tu perfil</a>
    </div>
</div>
@endsection
