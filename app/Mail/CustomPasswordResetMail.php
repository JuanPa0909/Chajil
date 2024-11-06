<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomPasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $actionUrl;

    public function __construct($actionUrl)
    {
        $this->actionUrl = $actionUrl;
    }

    public function build()
    {
        return $this->subject('Recuperación de Contraseña')
                    ->markdown('emails.auth.password_reset')
                    ->with([
                        'actionUrl' => $this->actionUrl,
                    ]);
    }
}
