<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; // Asegúrate de tener un modelo Sale

class ReportController extends Controller
{
    public function sales()
    {
        $sales = Sale::all(); // Obtener todas las ventas, puedes filtrar o ajustar según tus necesidades
        return view('reports.sales', compact('sales'));
    }
}