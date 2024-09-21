<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function store(Request $request)
    {
        // Validar el número de mesa
        $request->validate([
            'mesa' => 'required',
            'itemsSeleccionados' => 'required|array|min:1'
        ]);

        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->id_usuario = Auth::id();  // Asignar el ID del usuario actual
        $pedido->mesa = $request->mesa;
        $pedido->estado = 'pendiente';
        $pedido->total = 0; 
        $pedido->save();

        // Recorrer los items seleccionados y agregarlos a la tabla pedido_items
        $totalPedido = 0;
        foreach ($request->itemsSeleccionados as $itemId) {
            $item = Menu::find($itemId) ?? Bebida::find($itemId);

            if ($item) {
                $pedidoItem = new PedidoItem();
                $pedidoItem->id_pedido = $pedido->id_pedido;
                $pedidoItem->id_item = $itemId;
                $pedidoItem->tipo_item = $item instanceof Menu ? 'menu' : 'bebida';
                $pedidoItem->cantidad = 1;  
                $pedidoItem->precio = $item->precio;
                $pedidoItem->save();

                // Sumar al total del pedido
                $totalPedido += $item->precio;
            }
        }

        // Actualizar el total del pedido
        $pedido->total = $totalPedido;
        $pedido->save();

        return redirect()->route('pedido.index')->with('success', 'Pedido registrado exitosamente');
    }
}
