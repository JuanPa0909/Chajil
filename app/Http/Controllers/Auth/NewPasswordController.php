<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewPasswordController extends Controller
{

    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }


    public function reset(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $resetRequest = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        // Verifica si el token es válido y no ha expirado (60 minutos de vigencia)
        if (!$resetRequest || Carbon::parse($resetRequest->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['email' => 'El token es inválido o ha expirado.']);
        }

        // Busca al usuario en la base de datos por correo electrónico
        $user = Usuario::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con ese correo electrónico.']);
        }

        // Actualiza la contraseña del usuario en la base de datos
        $user->password = Hash::make($request->password);
        $user->save();

        // Elimina el registro de token después de su uso
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Redirige al formulario con un mensaje de éxito para mostrar el modal
        return redirect()->route('password.reset', ['token' => $request->token])->with('status', 'Contraseña actualizada con éxito.');
    }
}
