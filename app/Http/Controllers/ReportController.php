<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; 
use PDF;
use App\Models\Product; 


class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function generate(Request $request)
    {
        // Lógica para generar el reporte basado en el tipo y las fechas seleccionadas.
        $validated = $request->validate([
            'report_type' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        if ($validated['report_type'] === 'sales') {
            return $this->generateSalesReportPDF($validated['date_from'], $validated['date_to']);
        }elseif ($validated['report_type'] === 'products') {
            return $this->generateProductReportPDF($validated['date_from'], $validated['date_to']);
        }
        return back()->with('success', 'Reporte generado con éxito');
    }

    public function generateSalesReportPDF()
    {
        
        $sales = Sale::all();
        $pdf = PDF::loadView('reports.sales_pdf', compact('sales'));
        return $pdf->download('reporte_ventas.pdf');
    }

    public function generateProductReportPDF()
    {
        $products = Product::all();
        $pdf = PDF::loadView('reports.products_pdf', compact('products'));
        return $pdf->download('reporte_productos.pdf');
    }
}