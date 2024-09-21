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
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'mesa' => 'required|string|max:10',
            'itemsSeleccionados' => 'required|array',
            'itemsSeleccionados.*.id_item' => 'required|integer',
            'itemsSeleccionados.*.tipo_item' => 'required|in:menu,bebida',
            'itemsSeleccionados.*.precio' => 'required|numeric',
            'cantidad' => 'required|array',
            'cantidad.*' => 'required|integer|min:1',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Crear el pedido
        $pedido = Pedido::create([
            'id_usuario' => $user->id_usuario,  // Se asigna el usuario autenticado automáticamente
            'mesa' => $validatedData['mesa'],
            'estado' => 'pendiente',
            'total' => 0, // Se actualizará después
        ]);

        // Procesar los ítems seleccionados y crear los ítems del pedido
        $total = 0;
        foreach ($validatedData['itemsSeleccionados'] as $key => $itemSeleccionado) {
            $cantidad = $validatedData['cantidad'][$key];
            $precioTotal = $cantidad * $itemSeleccionado['precio'];

            PedidoItem::create([
                'id_pedido' => $pedido->id_pedido,
                'id_item' => $itemSeleccionado['id_item'],
                'tipo_item' => $itemSeleccionado['tipo_item'],
                'cantidad' => $cantidad,
                'precio' => $itemSeleccionado['precio'],
            ]);

            $total += $precioTotal;
        }

        // Actualizar el total del pedido
        $pedido->update(['total' => $total]);

        return redirect()->route('menu.index')->with('success', 'Pedido creado exitosamente.');
    }
}
