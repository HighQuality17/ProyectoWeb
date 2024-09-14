<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $user = auth()->user();

    if ($user->role_id == 1) { // Administrador
        return redirect()->route('admin.index');
    } elseif ($user->role_id == 2) { // Cliente
        return redirect()->route('profile.home');
    } else {
        return redirect('/'); // Otra ruta en caso de que el rol no sea reconocido
    }
    }

}
