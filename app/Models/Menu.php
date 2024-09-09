<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_menu';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'tipo_menu']; 

    public function isDesayuno() {
        return $this->tipo_menu === 'desayuno';
    }

    public function isAlmuerzo() {
        return $this->tipo_menu === 'almuerzo';
    }

    public function isRefaccion() {
        return $this->tipo_menu === 'refaccion';
    }
}
