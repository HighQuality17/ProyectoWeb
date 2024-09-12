<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las direcciones de la base de datos
        $addresses = Address::where('user_id', auth()->id())->get();
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear una nueva dirección
        return view('addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'department' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
        ]);

        // Crear una nueva dirección
        $address = new Address();
        $address->department = $request->department;
        $address->city = $request->city;
        $address->neighborhood = $request->neighborhood;
        $address->address_line1 = $request->address_line1;
        $address->address_line2 = $request->address_line2;
        $address->user_id = Auth::id(); // Asociar el ID del usuario autenticado

        // Guardar la nueva dirección en la base de datos
        $address->save();

        // Redirigir a la pagina addresses.index con un mensaje de éxito
        return redirect()->route('addresses.index')->with('success', 'Dirección creada correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar una dirección específica
        $address = Address::findOrFail($id);
        return view('addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mostrar el formulario para editar una dirección
        $address = Address::findOrFail($id);
        return view('addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos
        $request->validate([
            'department' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
        ]);

        // Actualizar la dirección
        $address = Address::findOrFail($id);
        $address->department = $request->department;
        $address->city = $request->city;
        $address->neighborhood = $request->neighborhood;
        $address->address_line1 = $request->address_line1;
        $address->address_line2 = $request->address_line2;
        $address->save();

        // Redirigir después de actualizar
        return redirect()->route('addresses.index')->with('success', 'Dirección actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar una dirección específica
        $address = Address::findOrFail($id);
        $address->delete();

        // Redirigir después de eliminar
        return redirect()->route('addresses.index')->with('success', 'Dirección eliminada correctamente');
    }
}
