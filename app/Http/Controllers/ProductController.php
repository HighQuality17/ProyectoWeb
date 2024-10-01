<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Coment; // Asegúrate de incluir el modelo Coment
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string',
        'line' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'weight' => 'required|numeric',
        'stock' => 'required|integer',
        'guarantee' => 'required|integer',
        'brand' => 'required|string',
        'size' => 'required|numeric',
        'color' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

    // Procesa la imagen
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    } else {
        $imageName = null;
    }

    $product = new Product();
    $product->name = $request->name;
    $product->line = $request->line;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->weight = $request->weight;
    $product->stock = $request->stock;
    $product->guarantee = $request->guarantee;
    $product->brand = $request->brand;
    $product->size = $request->size;
    $product->color = $request->color;
    $product->image = $imageName;
    $product->save();

    return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }


    public function show(string $id)
    {
        $product = Product::find($id);
        return view('shop-single', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    // Validación de los campos
    $request->validate([
        'name' => 'required|string',
        'line' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'weight' => 'required|numeric',
        'stock' => 'required|integer',
        'guarantee' => 'required|integer',
        'brand' => 'required|string',
        'size' => 'required|numeric',
        'color' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Manejo de la imagen si se proporciona una nueva
    if ($request->hasFile('image')) {
        // Elimina la imagen anterior si existe
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        // Sube y guarda la nueva imagen
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $product->image = $imageName; // Actualiza el campo 'image' en la base de datos
    }

    // Actualización del producto
    $product->update([
        'name' => $request->name,
        'line' => $request->line,
        'description' => $request->description,
        'price' => $request->price,
        'weight' => $request->weight,
        'stock' => $request->stock,
        'guarantee' => $request->guarantee,
        'brand' => $request->brand,
        'size' => $request->size,
        'color' => $request->color,
        'image' => $product->image ?? $product->image, // Asegura que se conserve la imagen si no se sube una nueva
    ]);

    return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
}



    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
    public function shopList()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }
}
