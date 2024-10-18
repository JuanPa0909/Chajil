<?php

namespace App\Http\Controllers;

use App\Models\PagoActividad;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class ReporteActividadesController extends Controller
{
    public function index(Request $request)
    {
        $tipoFiltro = $request->input('tipo_filtro', 'dia');
        $fechaInicio = null;
        $fechaFin = null;

        if ($tipoFiltro === 'dia') {
            $fechaInicio = Carbon::parse($request->input('fecha_dia'))->startOfDay();
            $fechaFin = Carbon::parse($request->input('fecha_dia'))->endOfDay();
        } else if ($tipoFiltro === 'mes') {
            $fechaInicio = Carbon::parse($request->input('fecha_inicio'))->startOfDay();
            $fechaFin = Carbon::parse($request->input('fecha_fin'))->endOfDay();
        }

        // Consultar los pagos de actividades en el rango de fechas
        $actividadesPagadas = PagoActividad::whereBetween('fecha_hora', [$fechaInicio, $fechaFin])
            ->with('actividad')
            ->get();

        // Calcular totales
        $totalActividades = $actividadesPagadas->count();
        $totalIngresos = $actividadesPagadas->sum('monto');

        // Agrupar por actividad y calcular los totales por actividad
        $actividadesTotales = $actividadesPagadas->groupBy('id_actividad')->map(function ($actividad) {
            return [
                'nombre' => $actividad->first()->actividad->nombre,
                'totalTickets' => $actividad->sum('cantidadTickets'),
                'totalMonto' => $actividad->sum('monto'),
            ];
        });

        return view('admin.reporte_actividades', compact(
            'actividadesPagadas',
            'totalActividades',
            'totalIngresos',
            'fechaInicio',
            'fechaFin',
            'actividadesTotales'
        ));
    }

    public function generarPDF(Request $request)
    {
        $tipoFiltro = $request->input('tipo_filtro', 'dia');
        $fechaInicio = null;
        $fechaFin = null;

        if ($tipoFiltro === 'dia') {
            $fechaInicio = Carbon::parse($request->input('fecha_dia'))->startOfDay();
            $fechaFin = Carbon::parse($request->input('fecha_dia'))->endOfDay();
        } else if ($tipoFiltro === 'mes') {
            $fechaInicio = Carbon::parse($request->input('fecha_inicio'))->startOfDay();
            $fechaFin = Carbon::parse($request->input('fecha_fin'))->endOfDay();
        }

        // Consultar los pagos de actividades en el rango de fechas
        $actividadesPagadas = PagoActividad::whereBetween('fecha_hora', [$fechaInicio, $fechaFin])
            ->with('actividad')
            ->get();

        $totalActividades = $actividadesPagadas->count();
        $totalIngresos = $actividadesPagadas->sum('monto');

        // Agrupar por actividad y calcular los totales por actividad
        $actividadesTotales = $actividadesPagadas->groupBy('id_actividad')->map(function ($actividad) {
            return [
                'nombre' => $actividad->first()->actividad->nombre,
                'totalTickets' => $actividad->sum('cantidadTickets'),
                'totalMonto' => $actividad->sum('monto'),
            ];
        });

        // Generar el PDF
        $pdf = PDF::loadView('admin.reporte_actividades_pdf', compact(
            'totalActividades',
            'totalIngresos',
            'fechaInicio',
            'fechaFin',
            'actividadesTotales'
        ));

        return $pdf->download('reporte_actividades.pdf');
    }
}
