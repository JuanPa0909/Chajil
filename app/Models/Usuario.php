<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios'; 
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'tipo_usuario',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'estado',
        'password', 
        'fechaCreacion',
        'ultimoAcceso',
    ];

    public $timestamps = false;

    // Encriptación automática de la contraseña
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
