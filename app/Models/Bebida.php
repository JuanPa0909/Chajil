<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;

    // Especificamos el nombre correcto de la tabla
    protected $table = 'bebidas';  

    // Declaramos la clave primaria que corresponde a la tabla "bebidas"
    protected $primaryKey = 'id_bebida';

    // Campos que pueden ser llenados en la base de datos
    protected $fillable = ['nombre', 'descripcion', 'precio', 'tipo_bebida'];

    // Funciones adicionales para verificar el tipo de bebida
    public function isCaliente() {
        return $this->tipo_bebida === 'caliente';
    }

    public function isFria() {
        return $this->tipo_bebida === 'fria';
    }
}
