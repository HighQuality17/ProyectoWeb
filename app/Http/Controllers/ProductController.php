<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
      
           
        $product = new Product();
        $product->name = $request->product_name;
        $product->line = $request->product_line;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->weight = $request->product_weight;
        $product->stock = $request->product_stock;

        $product->guarantee = $request->product_guarantee;
        $product->brand = $request->product_brand;
        $product->size = $request->product_size;
        $product->color = $request->product_color;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');

    
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
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

    return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
}
    

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }


  
}
