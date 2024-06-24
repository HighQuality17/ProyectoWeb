<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        return view('products.index',compact('products'));  
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->line = $request->product_line;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->weight = $request->product_weight;
        $product->stock = $request->product_stock;
        $product->details = $request->product_details;
        $product->guarantee = $request->product_guarantee;
        $product->brand = $request->product_brand;
        $product->size = $request->product_size;
        $product->color = $request->product_color;
        $product->save();
        return redirect()->route('products.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //Se utiliza para consultar los datos a editar
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    public function update(Request $request, string $id)
    {
        //Se hace el update en la base de datos
        $product = Product::find($id);
        $product->line = $request->product_line;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->weight = $request->product_weight;
        $product->stock = $request->product_stock;
        $product->details = $request->product_details;
        $product->guarantee = $request->product_guarantee;
        $product->brand = $request->product_brand;
        $product->size = $request->product_size;
        $product->color = $request->product_color;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function destroy(string $id)
    {
        //Para eliminar un registro en la base de datos
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
