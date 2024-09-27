<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Listar todos los productos
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    // Mostrar un producto específico
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json($product, 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
    // Validación de los datos enviados
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'line' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'weight' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'guarantee' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'size' => 'required|numeric|min:0',
        'color' => 'required|string|max:255',
    ]);

    // Creación del producto en la base de datos
    $product = Product::create($validated);

    // Retorna el producto creado con un código 201 (creado)
    return response()->json($product, 201);
    }


    // Actualizar un producto
    public function update(Request $request, $id)
    {
    // Buscar el producto por ID
    $product = Product::find($id);

    // Si el producto existe, proceder con la actualización
    if ($product) {
        // Validar los datos del request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'line' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'guarantee' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'size' => 'required|numeric|min:0',
            'color' => 'required|string|max:255',
        ]);

        // Actualizar el producto con los datos validados
        $product->update($validated);

        // Retornar el producto actualizado con un código 200 (OK)
        return response()->json($product, 200);
    } else {
        // Si el producto no existe, retornar un error 404 (No encontrado)
        return response()->json(['message' => 'Product not found'], 404);
    }
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted'], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
