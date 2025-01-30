<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
    $this->validateLogin($request);

    if (Auth::attempt($this->credentials($request))) {
        $request->session()->regenerate();

        $user = Auth::user();
        dd($user->role_id );
        if ($user->role_id == 1) { // Asumiendo que '1' es el ID del rol 'Administrador'
            return redirect()->route('admin.home');
        } elseif ($user->role_id == 3) {
            return redirect()->route('provider.home')
        } else {
            return redirect()->route('profile.home');
        }
    }

    return back()->withErrors([
        'email' => __('auth.failed'),
    ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
