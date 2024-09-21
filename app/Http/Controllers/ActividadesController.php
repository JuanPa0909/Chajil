<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\PagoActividad;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();
        return view('actividades.index', compact('actividades'));
    }

public function registrarPago(Request $request, $id_actividad)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Debe estar autenticado para realizar esta acción.');
    }

    $usuario = auth()->user(); // Usuario autenticado
    $actividad = Actividad::findOrFail($id_actividad);

    $pago = new PagoActividad([
        'id_actividad' => $id_actividad,
        'id_usuario' => $usuario->id_usuario,
        'cantidadTickets' => $request->input('cantidad'),
        'monto' => $actividad->costo * $request->input('cantidad'),
        'fecha_hora' => now(),
        'estadoPago' => 'Pagado',
        'descuento' => $request->input('descuento', 0)
    ]);
    $pago->save();

    return redirect()->route('actividades.index')->with('success', 'Pago registrado con éxito.');
}

}
