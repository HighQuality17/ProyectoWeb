<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $apiKey = config('services.google_maps.key');
        return view('contact', compact('apiKey'));
    }

    public function submit(Request $request)
    {
    // Validación de los datos del formulario
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
    ]);

    // Sanitizar los datos para prevenir inyecciones
    $sanitizedData = [
        'name' => e($validatedData['name']),
        'email' => e($validatedData['email']),
        'subject' => e($validatedData['subject']),
        'message' => e($validatedData['message']),
    ];

    // Aquí puedes guardar los datos sanitizados en la base de datos o procesarlos

    // Retornar una respuesta
    return redirect()->back()->with('success', 'Gracias por contactarnos. Te responderemos pronto.');
    }

}
