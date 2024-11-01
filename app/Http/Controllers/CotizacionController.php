<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;

class CotizacionController extends Controller
{
    public function index()
    {
        return view('reservaciones');  
    }

    // Procesar la solicitud de cotización enviada por el cliente
    public function procesarCotizacion(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombreCliente' => 'required|string|max:255',
            'emailCliente' => 'required|email',
            'telefonoCliente' => 'required|string|max:15',
            'tipoEvento' => 'required|string',
            'fechaEvento' => 'required|date|after_or_equal:today',
            'horaEvento' => 'required',
            'numeroPersonas' => 'required|numeric|min:1',
            'opcionAlquiler' => 'required|numeric',
        ]);

        // Guardar la cotización en la base de datos
        Cotizacion::create([
            'nombre_cliente' => $validated['nombreCliente'],
            'email_cliente' => $validated['emailCliente'],
            'telefono_cliente' => $validated['telefonoCliente'],
            'tipo_evento' => $validated['tipoEvento'],
            'fecha_evento' => $validated['fechaEvento'],
            'hora_evento' => $validated['horaEvento'],
            'numero_personas' => $validated['numeroPersonas'],
            'opcion_alquiler' => $validated['opcionAlquiler'],
            'estado' => 'pendiente',  // El estado por defecto es 'pendiente'
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('reservaciones')->with('success', 'Tu solicitud de cotización ha sido enviada correctamente. Te contactaremos pronto.');
    }

    // Mostrar todas las cotizaciones en la vista de administración
    public function verCotizaciones()
    {
        // Obtener todas las cotizaciones
        $cotizaciones = Cotizacion::all();
        return view('admin.gestion_cotizaciones', compact('cotizaciones'));
    }

    // Método para actualizar el estado de una cotización a "contactado"
    public function actualizarEstado($id)
    {
        $cotizacion = Cotizacion::find($id);
        $cotizacion->estado = 'contactado';  // Cambiar el estado a "contactado"
        $cotizacion->save();

        return redirect()->back()->with('success', 'Cotización marcada como contactada.');
    }

    // Método para eliminar una cotización
    public function eliminarCotizacion($id)
    {
        $cotizacion = Cotizacion::find($id);
        $cotizacion->delete();

        return redirect()->back()->with('success', 'Cotización eliminada correctamente.');
    }
}
