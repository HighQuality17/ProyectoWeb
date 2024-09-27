<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Mostrar carrito
    public function index()
{
    // Obtener todos los productos del carrito del usuario autenticado
    $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();
    // Pasar los items del carrito a la vista
    return view('cart.index', compact('cartItems'));
}

#Añadir producto al carrito
    public function add(Request $request)
{
    // Verificar que el usuario esté autenticado
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para añadir productos al carrito.');
    }

    // Validar que la cantidad es un número válido
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'product-quantity' => 'required|integer|min:1',
    ]);

    // Encontrar el producto por su ID
    $product = Product::find($request->product_id);

    // Verificar que el producto exista
    if (!$product) {
        return redirect()->back()->with('error', 'Producto no encontrado.');
    }

    // Verificar si el producto ya está en el carrito del usuario
    $cartItem = CartItem::where('user_id', Auth::id())
                        ->where('product_id', $product->id)
                        ->first();

    if ($cartItem) {
        // Si ya existe en el carrito, solo aumenta la cantidad
        $cartItem->quantity += $request->input('product-quantity', 1);
        $cartItem->save();
    } else {
        // Si no existe, lo añade al carrito
        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->input('product-quantity', 1),
            'image' => $product->image,
            'name' => $product->name,
            'price' => $product->price
        ]);
    }

    return redirect()->back()->with('success', 'Producto añadido al carrito');
}




    // Remover producto del carrito
    public function remove(Request $request)
{
    // Verificar que el usuario esté autenticado
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para eliminar productos del carrito.');
    }
    
    // Encontrar el producto en el carrito del usuario autenticado
    $cartItem = CartItem::where('user_id', Auth::id())
                        ->where('product_id', $request->product_id)
                        ->first();
    
    if ($cartItem) {
        // Eliminar el producto del carrito (de la base de datos)
        $cartItem->delete();
    }
    
    return redirect()->back()->with('success', 'Producto eliminado del carrito');
}

    // Actualizar cantidad en el carrito
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;  // Actualizar cantidad
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cantidad actualizada');
    }

    public function showCart()
{
    // Obtener todos los productos del carrito del usuario autenticado
    $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();

    return view('cart.show', compact('cartItems'));
}

}
