<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaccionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth'); // ✔ Correcto aquí
    }

    public function index()
    {
        $usuario = Auth::user(); // Obtener usuario autenticado
        return view('transaccion', compact('usuario'));
    }


    public function recargar(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|min:10000',
        ]);

        $usuario = Auth::user();
        $usuario->saldo_ini += $request->monto;
        $usuario->save();

        return redirect()->route('transaccion.index')->with('éxito', 'Recarga exitosa');
    }
}