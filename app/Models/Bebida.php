<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bebida';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'tipo_bebida']; 

    public function isCaliente() {
        return $this->tipo_bebida === 'caliente';
    }

    public function isFria() {
        return $this->tipo_bebida === 'fria';
    }
}
