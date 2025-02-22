@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold mb-4" style="color: #004d40;">Reporte General</h1>
    <p class="text-center text-muted mb-5">Resumen de actividades y operaciones del restaurante.</p>

    <!-- Formulario de Filtro por Fecha -->
    <form action="{{ route('admin.reporte-general') }}" method="GET">
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" value="{{ $fechaInicio->toDateString() }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fecha_fin">Fecha Fin</label>
                    <input type="date" name="fecha_fin" class="form-control" value="{{ $fechaFin->toDateString() }}" required>
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Botón para generar el PDF -->
    <div class="text-right mb-4">
        <a href="{{ route('admin.reporte-general.pdf', ['fecha_inicio' => $fechaInicio->toDateString(), 'fecha_fin' => $fechaFin->toDateString()]) }}" class="btn btn-primary">
            Descargar PDF
        </a>
    </div>

    <!-- Parte superior: Resumen general -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card text-center mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3" style="color: #004d40;">Resumen de Actividades</h4>
                    <p><strong>Total de Actividades Pagadas:</strong> {{ $totalActividades }}</p>
                    <p><strong>Total Ingresos por Actividades:</strong> Q{{ number_format($totalIngresosActividades, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3" style="color: #004d40;">Resumen del Restaurante</h4>
                    <p><strong>Total de Pedidos:</strong> {{ $totalPedidos }}</p>
                    <p><strong>Total Ingresos del Restaurante:</strong> Q{{ number_format($totalIngresosRestaurante, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Parte inferior: Desglose por Actividad y Productos -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Desglose por Actividad</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre de la Actividad</th>
                                <th>Total de Tickets Vendidos</th>
                                <th>Total Ingresos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actividadesTotales as $actividad)
                            <tr>
                                <td>{{ $actividad['nombre'] }}</td>
                                <td>{{ $actividad['totalTickets'] }}</td>
                                <td>Q{{ number_format($actividad['totalMonto'], 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Desglose por Producto del Restaurante</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre del Producto</th>
                                <th>Cantidad Vendida</th>
                                <th>Total Ingresos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productosVendidos as $producto)
                            <tr>
                                <td>{{ $producto['nombre'] }}</td>
                                <td>{{ $producto['cantidad'] }}</td>
                                <td>Q{{ number_format($producto['cantidad'] * 10, 2) }}</td> <!-- Ajustar cálculo de ingresos según el precio real del producto -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
