<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categoria';
    protected $fillable = ['nombre', 'descripcion'];


    public function items() {
        return $this->hasMany(Item::class, 'id_categoria');
    }
}

