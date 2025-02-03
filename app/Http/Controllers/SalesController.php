<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    // Mostrar una lista de ventas del usuario autenticado
    public function index()
    {
        // Obtener las ventas del usuario autenticado
        $sales = Auth::user()->sales;

        return view('sales.index', compact('sales'));
    }

    // Mostrar detalles de una venta específica
    public function show($id)
    {
        // Buscar la venta por ID, asegurándose que pertenezca al usuario autenticado
        $sale = Sale::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('sales.show', compact('sale'));
    }

    // Mostrar el formulario para editar una venta específica
    public function edit($id)
    {
        // Buscar la venta por ID, asegurándose que pertenezca al usuario autenticado
        $sale = Sale::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('sales.edit', compact('sale'));
    }

    // Guardar una nueva venta
    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'sale_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'dispatch_date' => 'required|date',
        ]);

        // Crear una nueva venta para el usuario autenticado
        $sale = new Sale();
        $sale->user_id = Auth::user()->id;
        $sale->sale_date = now();
        $sale->created_at = now();
        $sale->total_amount = $request->total_amount;
        $sale->dispatch_date = now();
        $sale->save();

        // Redirigir a la vista de lista de ventas con un mensaje de éxito
        return redirect()->route('sales.index')->with('success', 'Venta creada correctamente');
    }


    // Actualizar los datos de una venta
    public function update(Request $request, $id)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'sale_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'dispatch_date' => 'required|date',
        ]);

        // Buscar la venta por ID, asegurándose que pertenezca al usuario autenticado
        $sale = Sale::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Actualizar los datos de la venta
        $sale->sale_date = $request->sale_date;
        $sale->total_amount = $request->total_amount;
        $sale->dispatch_date = $request->dispatch_date;
        $sale->save();

        // Redirigir a la vista de lista de ventas con un mensaje de éxito
        return redirect()->route('sales.index')->with('success', 'Venta actualizada correctamente');
    }
}