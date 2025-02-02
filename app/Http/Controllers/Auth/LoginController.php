<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the post register / login path.
     *
     * @return string
     */
    protected function authenticated(Request $request, $user)
    {
        // Redirigir según el rol del usuario
        if ($user->role_id == 1) {
            // Administrador
            return redirect()->route('admin.home');
        } elseif ($user->role_id == 2) {
            // Cliente
            return redirect()->route('profile.home');
        }elseif ($user->role_id == 3) {
            // Cliente
            return redirect()->route('provider.home');
        }

        // Redirección predeterminada
        return redirect()->route('home');
    }
}
