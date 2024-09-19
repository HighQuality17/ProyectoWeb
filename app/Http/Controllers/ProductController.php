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
            'name' => 'required',
            'line' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'stock' => 'required|integer',
            'guarantee' => 'required|integer',
            'brand' => 'required',
            'size' => 'required|integer',
            'color' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
        $product->name = $request->name; // Asegúrate de que el formulario envíe el campo "name"
        $product->line = $request->line;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->guarantee = $request->guarantee;
        $product->brand = $request->brand;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->image = $imageName; // Asigna la ruta de la imagen
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
        $request->validate([
            'name' => 'required',
            'line' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'stock' => 'required|integer',
            'guarantee' => 'required|integer',
            'brand' => 'required',
            'size' => 'required|integer',
            'color' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
        ]);

        // Procesa la imagen si se proporciona una nueva
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

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
