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
        $addresses = $user->addresses;
        $sales = $user->sales; // Asegúrate de tener una relación en el modelo User para pedidos

        return view('home', compact('addresses', 'sales'));
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
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
        ]);

        // Actualizar la información del usuario autenticado
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('profile.edit')->with('success', 'Información actualizada correctamente');
    }
}