<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Mail\CustomPasswordResetMail;
use Illuminate\Support\Facades\Mail;

class PasswordResetLinkController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('users')->sendResetLink(
            $request->only('email'),
            function ($user, $token) {
                // Generar el enlace de restablecimiento
                $resetLink = url(config('app.url').route('password.reset', ['token' => $token, 'email' => $user->email], false));
                Mail::to($user->email)->send(new CustomPasswordResetMail($resetLink));
            }
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
