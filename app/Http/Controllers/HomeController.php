<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $user = auth()->user();

    if ($user->role_id == 1) { // Administrador
        return redirect()->route('admin.home');
    } elseif ($user->role_id == 2) { // Cliente
        return redirect()->route('profile.home');
    } elseif ($user->role_id == 3) { // Cliente
        return redirect()->route('provider.home');
    }else {
        return redirect('/'); // Otra ruta en caso de que el rol no sea reconocido
    }
    }

    public function show()
    {
        $products = Product::all();
        return view('index',compact('products'));
    }

}
