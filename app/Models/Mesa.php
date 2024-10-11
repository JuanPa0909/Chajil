<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesas';
    protected $primaryKey = 'id_mesa'; 

    protected $fillable = ['numero_mesa', 'estado_mesa'];
}
