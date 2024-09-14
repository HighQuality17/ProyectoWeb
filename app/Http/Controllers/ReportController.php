<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; 
use PDF;
use App\Models\Product; 


class ReportController extends Controller
{
    public function generateSalesReportPDF()
    {
        
        $sales = Sale::all();
        $pdf = PDF::loadView('reports.sales_pdf', compact('sales'));
        return $pdf->download('reporte_ventas.pdf');
    }

    public function generateProductReportPDF()
    {
        $products = Product::all();
        $pdf = PDF::loadView('reports.product_pdf', compact('products'));
        return $pdf->download('reporte_productos.pdf');
    }
}