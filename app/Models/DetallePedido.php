<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedido';
    protected $fillable = ['id_pedido', 'id_menu', 'id_bebida', 'cantidad', 'precio_unitario', 'subtotal'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    public function bebida()
    {
        return $this->belongsTo(Bebida::class, 'id_bebida');
    }
}
