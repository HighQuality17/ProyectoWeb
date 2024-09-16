<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function contact()
{
    // Obtén la clave directamente del .env
    $apiKey = env('GOOGLE_MAPS_API_KEY');

    // Verifica si el valor es nulo
    if (!$apiKey) {
        dd('Google Maps API Key not found in .env');
    }

    return view('contact', compact('apiKey'));
}

}
