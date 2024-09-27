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
        $cart = session()->get('cart', []); // Obtener carrito de la sesión
        return view('cart.index', compact('cart'));
    }

    // Añadir producto al carrito
public function add(Request $request)
{
    // Verificar que el usuario esté autenticado
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para añadir productos al carrito.');
    }

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
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        // Si no existe, lo añade con cantidad 1
        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => 1,
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
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);  // Eliminar producto del carrito
            session()->put('cart', $cart);
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
