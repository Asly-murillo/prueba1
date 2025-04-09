<?php

namespace App\Http\Controllers\Auth;
use App\Models\tipo_documento;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    { 
       

        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|integer|exists:tipo_documentos,id',
            'documento'=> 'required|string|max:20|unique:users,documento',
            'names' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'saldo_ini'=> 'required|numeric|min:0',
            'password' => 'required|string|min:8|confirmed',
        ]);
        

       


        $user = User::create([
            'names' => $request->names, 
            'apellidos' => $request->apellidos,
            'email' => $request->email, 
            'documento' => $request->documento,
            'saldo_ini' => $request->saldo_ini,
            'tipo_documento_id' => $request->tipo_documento_id,
            'password' => Hash::make($request->password),
        ]);

        

        return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión.');

    }
    public function showRegistrationForm()
    {
        
        $tipos_documento = tipo_documento::all();
        return view('auth.register', compact('tipos_documento'));
    }
}