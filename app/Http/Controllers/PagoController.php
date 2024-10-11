<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        // Obtener todos los pedidos que aún no han sido pagados
        $pedidos = Pedido::whereDoesntHave('pagos')->get();

        return view('restaurante.pagos.index', compact('pedidos'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_pedido' => 'required|exists:pedidos,id_pedido', // Validar que el id_pedido exista en la tabla pedidos
            'monto' => 'required|numeric|min:0', // Validar que el monto sea numérico y positivo
            'metodo_pago' => 'required|string|max:255', // Validar el método de pago
        ]);

        // Verificar si el pedido existe
        $pedido = Pedido::find($request->id_pedido);
        if (!$pedido) {
            return back()->withErrors(['error' => 'Pedido no encontrado.']);
        }

        // Crear el registro del pago en la base de datos
        Pago::create([
            'id_pedido' => $request->id_pedido,
            'monto' => $request->monto,
            'metodo_pago' => $request->metodo_pago,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente.');
    }
}
