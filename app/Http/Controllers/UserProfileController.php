<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        $sales = $user->sales; // Asegúrate de tener una relación en el modelo User para pedidos

        return view('home', compact('addresses', 'sales'));
    }
}