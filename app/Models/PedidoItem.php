<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    protected $table = 'pedido_items';
    protected $primaryKey = 'id_pedido_item';
    public $timestamps = false;

    protected $fillable = [
        'id_pedido',
        'id_item',
        'tipo_item',
        'cantidad',
        'precio'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
}
