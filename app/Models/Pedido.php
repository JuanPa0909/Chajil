<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido'; 
    protected $fillable = ['id_usuario', 'id_mesa', 'total', 'estado_pedido'];

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'id_mesa');
    }

    public function pagos()
    {
    return $this->hasMany(Pago::class, 'id_pedido');
    }

}
