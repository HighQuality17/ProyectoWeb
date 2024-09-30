<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class AdminController extends Controller
{
    // Mostrar la página principal del administrador
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        // Aquí podrías obtener datos para el panel, como productos o usuarios
        $products = Product::all(); // Ejemplo de obtención de productos
        $reports = []; // Datos de reportes (esto es solo un ejemplo)

        return view('admin.index', compact('products', 'reports'));
    }

    // Mostrar todos los productos
    public function manageProducts()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Mostrar el formulario para crear un nuevo producto
    public function createProduct()
    {
        return view('admin.products.create');
    }

    // Guardar un nuevo producto en la base de datos
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Producto creado correctamente.');
    }

    // Mostrar el formulario para editar un producto existente
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Actualizar un producto existente
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar un producto
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente.');
    }

    // Generar un reporte de ventas
    public function generateSalesReport()
    {
        $sales = Sale::all();
        // Aquí puedes crear lógica para generar el reporte en PDF o Excel.
        return view('admin.reports.sales', compact('sales'));
    }

    // Generar un reporte de productos
    public function generateProductReport()
    {
        $products = Product::all();
        // Lógica para generar reporte de productos
        return view('admin.reports.products', compact('products'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
