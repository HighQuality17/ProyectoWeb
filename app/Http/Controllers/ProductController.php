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
        $product->name = $request->product_name;
        $product->price = $request->product_price;

        $product->stock = $request->product_stock;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product = new Product();
        $product->name = $request->product_name;
        $product->price = $request->product_price;

        $product->stock = $request->product_stock;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }
    

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
