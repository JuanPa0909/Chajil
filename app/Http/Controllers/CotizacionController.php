<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CotizacionController extends Controller
{
    // Muestra la vista de cotización
    public function index()
    {
        return view('reservaciones');
    }

    // Procesa el formulario y sugiere menús según la hora seleccionada
    public function procesarCotizacion(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'tipoEvento' => 'required',
            'fechaEvento' => 'required|date',
            'horaEvento' => 'required',
            'numeroPersonas' => 'required|numeric|min:1',
            'opcionAlquiler' => 'required',
            'servicioComida' => 'required',
        ]);

        $horaEvento = $validated['horaEvento'];
        $sugerencias = [];

        // Sugerir menús según el rango de hora
        if ($horaEvento >= '07:00' && $horaEvento <= '10:00') {
            $sugerencias['desayuno'] = Menu::where('tipo_menu', 'desayuno')->take(3)->get();
            $sugerencias['refaccion'] = Menu::where('tipo_menu', 'refaccion')->take(3)->get();
        } elseif ($horaEvento >= '11:00' && $horaEvento <= '15:00') {
            $sugerencias['almuerzo'] = Menu::where('tipo_menu', 'almuerzo')->take(3)->get();
        } else {
            $sugerencias['refaccion'] = Menu::where('tipo_menu', 'refaccion')->take(3)->get();
        }

        // Si no se ha solicitado servicio de comida, eliminar sugerencias
        if ($validated['servicioComida'] == 'no') {
            $sugerencias = [];
        }

        return view('reservaciones', [
            'datos' => $validated,
            'sugerencias' => $sugerencias,
        ]);
    }

    // Calcula el costo total basado en el número de personas y los menús seleccionados
    public function calcularTotal(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'numeroPersonas' => 'required|numeric|min:1',
            'menusSeleccionados' => 'nullable|array',
            'opcionAlquiler' => 'required|numeric',
        ]);

        // Obtener los menús seleccionados (si existen)
        $menusSeleccionados = Menu::whereIn('id_menu', $validated['menusSeleccionados'] ?? [])->get();

        // Calcular el costo de los menús por el número de personas
        $costoTotalMenus = $menusSeleccionados->sum('precio') * $validated['numeroPersonas'];

        // Calcular el costo total final (alquiler del salón + costo de menús)
        $costoTotal = $validated['opcionAlquiler'] + $costoTotalMenus;

        return view('reservaciones', [
            'costoTotal' => $costoTotal,
            'datos' => $validated,
        ]);
    }
}
