<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
{
    $user = Auth::user();

    // Verificar si el usuario es administrador
    if ($user->role === 'Administrador') {
        return redirect()->route('admin.index');  // Redirige a la vista del administrador
    }

    // Si no es administrador, mostrar la vista del perfil de usuario
    $addresses = $user->addresses;
    $sales = $user->sales;

    return view('/profile/home', compact('addresses', 'sales'));
}

    public function edit()
    {
        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Muestra la vista de edición con la información del usuario
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'phone' => 'nullable|string|max:20',
        ]);

        // Actualizar la información del usuario autenticado
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('profile.edit')->with('success', 'Información actualizada correctamente');
    }
}