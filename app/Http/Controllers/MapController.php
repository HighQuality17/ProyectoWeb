<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    // Método para mostrar el mapa
    public function showMap()
    {
        // Define la ubicación para el mapa
        $location = [
            'lat' => -23.013104,
            'lng' => -43.394365
        ];

        // Pasa la variable a la vista
        return view('contact', compact('location'));
    }

    // Método para manejar solicitudes relacionadas con el mapa
    public function handleMapRequest(Request $request)
    {
        // Lógica para manejar datos relacionados con el mapa
        $data = $request->all();
        // Procesa los datos como necesites

        return redirect()->back()->with('success', 'Datos enviados con éxito.');
    }
}
