<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Bebida;
use PDF;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        // Convertir las fechas a instancias de Carbon
        $fechaInicio = Carbon::parse($request->input('fecha_inicio', Carbon::now()->startOfMonth()->toDateString()));
        $fechaFin = Carbon::parse($request->input('fecha_fin', Carbon::now()->endOfMonth()->toDateString()));

        // Consultar los pedidos en el rango de fechas
        $pedidos = Pedido::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();

        // Calcular las ganancias del mes actual
        $totalGananciasMesActual = $pedidos->sum('total');
        $totalPedidos = $pedidos->count();

        // Calcular las ganancias del mes anterior
        $inicioMesAnterior = Carbon::now()->subMonth()->startOfMonth();
        $finMesAnterior = Carbon::now()->subMonth()->endOfMonth();
        $pedidosMesAnterior = Pedido::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])->get();
        $totalGananciasMesAnterior = $pedidosMesAnterior->sum('total');

        // Agrupar los detalles por tipo de producto (menús y bebidas)
        $detallesVendidos = $pedidos->flatMap(function ($pedido) {
            return $pedido->detalles;
        });

        $menuesVendidos = $detallesVendidos->whereNotNull('id_menu')
                                           ->groupBy('id_menu')
                                           ->map(function ($items) {
                                               $menu = Menu::find($items->first()->id_menu);
                                               return [
                                                   'nombre' => $menu->nombre,
                                                   'tipo' => $menu->tipo_menu,
                                                   'cantidad' => $items->sum('cantidad')
                                               ];
                                           });

        $bebidasVendidas = $detallesVendidos->whereNotNull('id_bebida')
                                            ->groupBy('id_bebida')
                                            ->map(function ($items) {
                                                $bebida = Bebida::find($items->first()->id_bebida);
                                                return [
                                                    'nombre' => $bebida->nombre,
                                                    'cantidad' => $items->sum('cantidad')
                                                ];
                                            });

        // Dividir los menús por categorías
        $desayunosVendidos = $menuesVendidos->where('tipo', 'desayuno')->sum('cantidad');
        $almuerzosVendidos = $menuesVendidos->where('tipo', 'almuerzo')->sum('cantidad');
        $cenasVendidas = $menuesVendidos->where('tipo', 'cena')->sum('cantidad');

        // Pasar todos los datos a la vista usando compact()
        return view('admin.reportes', compact(
            'totalGananciasMesActual',
            'totalGananciasMesAnterior',
            'totalPedidos',
            'menuesVendidos',
            'bebidasVendidas',
            'desayunosVendidos',
            'almuerzosVendidos',
            'cenasVendidas',
            'fechaInicio',
            'fechaFin'
        ));
    }

    // Método para generar el PDF
    public function generarPDF(Request $request)
    {
        // Obtener las fechas
        $fechaInicio = Carbon::parse($request->input('fecha_inicio', Carbon::now()->startOfMonth()->toDateString()));
        $fechaFin = Carbon::parse($request->input('fecha_fin', Carbon::now()->endOfMonth()->toDateString()));

        // Reutilizar la lógica para obtener los datos
        $pedidos = Pedido::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
        $totalGananciasMesActual = $pedidos->sum('total');
        $totalPedidos = $pedidos->count();

        $inicioMesAnterior = Carbon::now()->subMonth()->startOfMonth();
        $finMesAnterior = Carbon::now()->subMonth()->endOfMonth();
        $pedidosMesAnterior = Pedido::whereBetween('created_at', [$inicioMesAnterior, $finMesAnterior])->get();
        $totalGananciasMesAnterior = $pedidosMesAnterior->sum('total');

        $detallesVendidos = $pedidos->flatMap(function ($pedido) {
            return $pedido->detalles;
        });

        $menuesVendidos = $detallesVendidos->whereNotNull('id_menu')
                                           ->groupBy('id_menu')
                                           ->map(function ($items) {
                                               $menu = Menu::find($items->first()->id_menu);
                                               return [
                                                   'nombre' => $menu->nombre,
                                                   'tipo' => $menu->tipo_menu,
                                                   'cantidad' => $items->sum('cantidad')
                                               ];
                                           });

        $bebidasVendidas = $detallesVendidos->whereNotNull('id_bebida')
                                            ->groupBy('id_bebida')
                                            ->map(function ($items) {
                                                $bebida = Bebida::find($items->first()->id_bebida);
                                                return [
                                                    'nombre' => $bebida->nombre,
                                                    'cantidad' => $items->sum('cantidad')
                                                ];
                                            });

        $desayunosVendidos = $menuesVendidos->where('tipo', 'desayuno')->sum('cantidad');
        $almuerzosVendidos = $menuesVendidos->where('tipo', 'almuerzo')->sum('cantidad');
        $cenasVendidas = $menuesVendidos->where('tipo', 'cena')->sum('cantidad');

        // Generar el PDF
        $pdf = PDF::loadView('admin.reportes_pdf', compact(
            'totalGananciasMesActual',
            'totalGananciasMesAnterior',
            'totalPedidos',
            'menuesVendidos',
            'bebidasVendidas',
            'desayunosVendidos',
            'almuerzosVendidos',
            'cenasVendidas',
            'fechaInicio',
            'fechaFin'
        ));

        return $pdf->download('reporte_ventas.pdf');
    }
}
