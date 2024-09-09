<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        // Validar la entrada del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
           
            $user = Auth::user();

            // Redirigir según el tipo de usuario
            if ($user->tipo_usuario === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/user-dashboard');
            }
        } else {
            // Redirigir de vuelta al formulario con un mensaje de error
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
