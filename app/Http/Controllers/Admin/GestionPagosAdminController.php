<?php

namespace App\Http\Controllers\admin;

use App\Models\Pago;
use App\Models\PagoActividad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class GestionPagosAdminController extends Controller
{
    // Mostrar la vista de gestión de pagos y cargar los pagos del día
    public function gestionPagos(Request $request)
    {
        // Obtener la fecha de hoy o la fecha seleccionada por el usuario
        $fecha = $request->input('fecha', Carbon::today()->toDateString());

        // Obtener los pagos de la tabla 'pagos' para la fecha seleccionada
        $pagos = Pago::whereDate('fecha_pago', $fecha)->get();

        // Obtener los pagos de la tabla 'pago_actividades' para la fecha seleccionada
        $pagosActividades = PagoActividad::whereDate('fecha_hora', $fecha)->get();

        // Pasar los resultados a la vista
        return view('admin.gestion-pagos', compact('pagos', 'pagosActividades', 'fecha'));
    }

    // Método para actualizar un pago
    public function actualizarPago(Request $request, $id)
    {
        // Verificar si el pago está en la tabla 'pagos'
        $pago = Pago::find($id);
        if ($pago) {
            $pago->update($request->only('monto', 'metodo_pago'));
        } else {
            // Si no está en la tabla 'pagos', buscar en 'pago_actividades'
            $pagoActividad = PagoActividad::find($id);
            if ($pagoActividad) {
                $pagoActividad->update($request->only('monto', 'cantidadTickets', 'descuento'));
            } else {
                return back()->withErrors(['error' => 'El pago no se pudo encontrar.']);
            }
        }

        return redirect()->route('admin.gestion-pagos')->with('success', 'Pago actualizado correctamente.');
    }
}
