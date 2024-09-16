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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);
        
        // Retornar una respuesta, por ejemplo, redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'Gracias por contactarnos. Te responderemos pronto.');
    }
}
