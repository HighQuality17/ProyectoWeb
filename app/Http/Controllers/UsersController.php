<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); 
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->idcard = $request->idcard;
        $user->phone = $request->phone;
        $user->password = $request->password;


        $user->save();
        return view('profile.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'idcard' => 'required|integer|unique:users,idcard,' . $id,
            'phone' => 'required|integer|unique:users,phone,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Contraseña opcional, con confirmación
            'role_id' => 'required|integer|exists:roles,id',
            'status' => 'required|boolean',
        ]);

        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Actualizar los datos del usuario
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->idcard = $validatedData['idcard'];
        $user->phone = $validatedData['phone'];
        $user->role_id = $validatedData['role_id'];
        $user->status = $validatedData['status'];

        // Actualizar la contraseña si se proporciona
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir a la lista de usuarios con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito.');
    }

    public function __invoke(Request $request)
    {
        // Lógica del controlador
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
