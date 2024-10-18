<?php

namespace App\Http\Controllers;

use App\Models\PagoActividad;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class ReporteGeneralController extends Controller
{
    public function index(Request $request)
    {
        // Fechas de inicio y fin (se pueden usar filtros si es necesario)
        $fechaInicio = $request->input('fecha_inicio') ? Carbon::parse($request->input('fecha_inicio'))->startOfDay() : Carbon::now()->startOfMonth();
        $fechaFin = $request->input('fecha_fin') ? Carbon::parse($request->input('fecha_fin'))->endOfDay() : Carbon::now()->endOfMonth();

        // Datos de Actividades
        $actividadesPagadas = PagoActividad::whereBetween('fecha_hora', [$fechaInicio, $fechaFin])
            ->with('actividad') // Cargar relación de actividad
            ->get();

        $totalActividades = $actividadesPagadas->count();
        $totalIngresosActividades = $actividadesPagadas->sum('monto');

        // Agrupar por actividad para el desglose
        $actividadesTotales = $actividadesPagadas->groupBy('id_actividad')->map(function ($actividad) {
            // Validar si existe la relación 'actividad'
            $nombreActividad = $actividad->first()->actividad->nombre ?? 'Actividad no encontrada';
            return [
                'nombre' => $nombreActividad,
                'totalTickets' => $actividad->sum('cantidadTickets'),
                'totalMonto' => $actividad->sum('monto'),
            ];
        });

        // Datos del Restaurante (Pedidos)
        $pedidos = Pedido::whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->with('detalles.menu') // Cargar relación 'menu' desde 'detalles'
            ->get();

        $totalPedidos = $pedidos->count();
        $totalIngresosRestaurante = $pedidos->sum('total');

        // Agrupar por productos del menú
        $productosVendidos = $pedidos->flatMap(function ($pedido) {
            return $pedido->detalles;
        })->groupBy('id_menu')->map(function ($items) {
            // Validar si existe la relación 'menu'
            $nombreProducto = $items->first()->menu->nombre ?? 'Producto no encontrado';
            return [
                'nombre' => $nombreProducto,
                'cantidad' => $items->sum('cantidad'),
            ];
        });

        return view('admin.reporte_general', compact(
            'totalActividades',
            'totalIngresosActividades',
            'actividadesTotales',
            'totalPedidos',
            'totalIngresosRestaurante',
            'productosVendidos',
            'fechaInicio',
            'fechaFin'
        ));
    }

    public function generarPDF(Request $request)
    {
        // Reutilizar los mismos datos que en el index
        $fechaInicio = $request->input('fecha_inicio') ? Carbon::parse($request->input('fecha_inicio'))->startOfDay() : Carbon::now()->startOfMonth();
        $fechaFin = $request->input('fecha_fin') ? Carbon::parse($request->input('fecha_fin'))->endOfDay() : Carbon::now()->endOfMonth();

        $actividadesPagadas = PagoActividad::whereBetween('fecha_hora', [$fechaInicio, $fechaFin])->with('actividad')->get();
        $totalActividades = $actividadesPagadas->count();
        $totalIngresosActividades = $actividadesPagadas->sum('monto');
        $actividadesTotales = $actividadesPagadas->groupBy('id_actividad')->map(function ($actividad) {
            $nombreActividad = $actividad->first()->actividad->nombre ?? 'Actividad no encontrada';
            return [
                'nombre' => $nombreActividad,
                'totalTickets' => $actividad->sum('cantidadTickets'),
                'totalMonto' => $actividad->sum('monto'),
            ];
        });

        $pedidos = Pedido::whereBetween('created_at', [$fechaInicio, $fechaFin])->with('detalles.menu')->get();
        $totalPedidos = $pedidos->count();
        $totalIngresosRestaurante = $pedidos->sum('total');
        $productosVendidos = $pedidos->flatMap(function ($pedido) {
            return $pedido->detalles;
        })->groupBy('id_menu')->map(function ($items) {
            $nombreProducto = $items->first()->menu->nombre ?? 'Producto no encontrado';
            return [
                'nombre' => $nombreProducto,
                'cantidad' => $items->sum('cantidad'),
            ];
        });

        // Generar el PDF
        $pdf = PDF::loadView('admin.reporte_general_pdf', compact(
            'totalActividades',
            'totalIngresosActividades',
            'actividadesTotales',
            'totalPedidos',
            'totalIngresosRestaurante',
            'productosVendidos',
            'fechaInicio',
            'fechaFin'
        ));

        return $pdf->download('reporte_general.pdf');
    }
}
