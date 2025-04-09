<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Evita ataques de sesión fija
            return redirect()->intended('/prueba/transaccion'); // Redirige a la página deseada
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Laravel usa redirectTo() en lugar de la variable estática
    protected function redirectTo()
    {
        return '/prueba/transaccion';
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login'); // Redirige al login después de cerrar sesión
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
