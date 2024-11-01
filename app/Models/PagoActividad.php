<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoActividad extends Model
{
    use HasFactory;

    protected $table = 'pagoactividad';

    protected $fillable = [
        'id_actividad', 'id_usuario', 'cantidadTickets', 'monto', 'fecha_hora', 'estadoPago', 'descuento'
    ];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'id_actividad');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
