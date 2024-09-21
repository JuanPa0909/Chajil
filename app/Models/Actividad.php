<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'actividades';
    protected $primaryKey = 'id_actividad';


    // Campos que se pueden llenar
    protected $fillable = [
        'nombre',
        'descripcion',
        'costo',
    ];
}
