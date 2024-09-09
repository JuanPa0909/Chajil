<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_item';
    protected $fillable = ['id_menu', 'id_categoria', 'descripcion', 'precio'];

    // Relación con Menu
    public function menu() {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    // Relación con Categoria
    public function categoria() {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
