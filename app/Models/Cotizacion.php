<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';  

    protected $fillable = [
        'nombre_cliente',       
        'email_cliente',        
        'telefono_cliente',     
        'tipo_evento',
        'fecha_evento',
        'hora_evento',
        'numero_personas',
        'opcion_alquiler',
        'estado',               
    ];
}
