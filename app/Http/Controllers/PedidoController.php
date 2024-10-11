<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Menu;
use App\Models\Bebida;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Método para procesar y almacenar el pedido
    public function store(Request $request)
    {
        // Crear el pedido inicial con el usuario actual y la mesa seleccionada
        $pedido = Pedido::create([
            'id_usuario' => auth()->user()->id_usuario, // Obtener el ID del usuario autenticado
            'id_mesa' => $request->mesa, // ID de la mesa enviado desde el formulario
            'total' => 0 // Inicialización del total del pedido
        ]);

        // Verificar que el pedido fue creado correctamente
        if (!$pedido) {
            return back()->withErrors(['error' => 'No se pudo crear el pedido.']);
        }

        $total = 0;  // Variable para mantener el total del pedido

        // Procesar los desayunos seleccionados
        if ($request->has('productos_desayuno')) {
            $productos_desayuno = $request->input('productos_desayuno', []);
            $cantidades_desayuno = $request->input('cantidades_desayuno', []);

            foreach ($productos_desayuno as $index => $menuId) {
                $menu = Menu::find($menuId);
                if ($menu && isset($cantidades_desayuno[$index]) && $cantidades_desayuno[$index] > 0) {
                    $cantidad = (int) $cantidades_desayuno[$index];
                    $subtotal = $menu->precio * $cantidad;

                    // Crear el detalle del pedido para el menú (desayuno)
                    DetallePedido::create([
                        'id_pedido' => $pedido->id_pedido,
                        'id_menu' => $menu->id_menu,
                        'cantidad' => $cantidad,
                        'precio_unitario' => $menu->precio,
                        'subtotal' => $subtotal
                    ]);

                    $total += $subtotal; // Sumar el subtotal al total
                }
            }
        }

        // Procesar los almuerzos seleccionados
        if ($request->has('productos_almuerzo')) {
            $productos_almuerzo = $request->input('productos_almuerzo', []);
            $cantidades_almuerzo = $request->input('cantidades_almuerzo', []);

            foreach ($productos_almuerzo as $index => $menuId) {
                $menu = Menu::find($menuId);
                if ($menu && isset($cantidades_almuerzo[$index]) && $cantidades_almuerzo[$index] > 0) {
                    $cantidad = (int) $cantidades_almuerzo[$index];
                    $subtotal = $menu->precio * $cantidad;

                    // Crear el detalle del pedido para el menú (almuerzo)
                    DetallePedido::create([
                        'id_pedido' => $pedido->id_pedido,
                        'id_menu' => $menu->id_menu,
                        'cantidad' => $cantidad,
                        'precio_unitario' => $menu->precio,
                        'subtotal' => $subtotal
                    ]);

                    $total += $subtotal; // Sumar el subtotal al total
                }
            }
        }

        // Procesar las refacciones seleccionadas
        if ($request->has('productos_refaccion')) {
            $productos_refaccion = $request->input('productos_refaccion', []);
            $cantidades_refaccion = $request->input('cantidades_refaccion', []);

            foreach ($productos_refaccion as $index => $menuId) {
                $menu = Menu::find($menuId);
                if ($menu && isset($cantidades_refaccion[$index]) && $cantidades_refaccion[$index] > 0) {
                    $cantidad = (int) $cantidades_refaccion[$index];
                    $subtotal = $menu->precio * $cantidad;

                    // Crear el detalle del pedido para el menú (refacción)
                    DetallePedido::create([
                        'id_pedido' => $pedido->id_pedido,
                        'id_menu' => $menu->id_menu,
                        'cantidad' => $cantidad,
                        'precio_unitario' => $menu->precio,
                        'subtotal' => $subtotal
                    ]);

                    $total += $subtotal; // Sumar el subtotal al total
                }
            }
        }

        // Procesar las bebidas seleccionadas
        if ($request->has('productos_bebida')) {
            $productos_bebida = $request->input('productos_bebida', []);
            $cantidades_bebida = $request->input('cantidades_bebida', []);

            foreach ($productos_bebida as $index => $bebidaId) {
                $bebida = Bebida::find($bebidaId);
                if ($bebida && isset($cantidades_bebida[$index]) && $cantidades_bebida[$index] > 0) {
                    $cantidad = (int) $cantidades_bebida[$index];
                    $subtotal = $bebida->precio * $cantidad;

                    // Crear el detalle del pedido para la bebida
                    DetallePedido::create([
                        'id_pedido' => $pedido->id_pedido,
                        'id_bebida' => $bebida->id_bebida,
                        'cantidad' => $cantidad,
                        'precio_unitario' => $bebida->precio,
                        'subtotal' => $subtotal
                    ]);

                    $total += $subtotal; // Sumar el subtotal al total
                }
            }
        }

        // Verificar si el total es mayor que 0 antes de guardar el pedido
        if ($total == 0) {
            return back()->withErrors(['error' => 'No se agregó ningún producto o bebida al pedido.']);
        }

        // Actualizar el total del pedido
        $pedido->update(['total' => $total]);

        // Retornar con éxito
        return back()->with('success', 'Pedido procesado correctamente.');
    }
}
