@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold mb-4" style="color: #004d40;">Reporte Detallado de Ganancias y Ventas</h1>
    <p class="text-center text-muted mb-5">Filtra las ganancias y productos vendidos del restaurante por fecha.</p>

    <!-- Formulario de Filtro por Fecha -->
    <form action="{{ route('admin.reportes') }}" method="GET">
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
        <a href="{{ route('admin.reportes.pdf', ['fecha_inicio' => $fechaInicio->toDateString(), 'fecha_fin' => $fechaFin->toDateString()]) }}" class="btn btn-primary">
            Descargar PDF
        </a>
    </div>

    <!-- Parte superior: Resumen de ventas a la izquierda y gráfica a la derecha -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card text-center mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3" style="color: #004d40;">Resumen de Ventas</h4>
                    <p><strong>Ganancias Totales:</strong> Q{{ number_format($totalGananciasMesActual, 2) }}</p>
                    <p><strong>Total de Menús Vendidos:</strong> {{ $desayunosVendidos + $almuerzosVendidos + $cenasVendidas }}</p>
                    <ul class="list-unstyled">
                        <li><strong>Desayunos:</strong> {{ $desayunosVendidos }}</li>
                        <li><strong>Almuerzos:</strong> {{ $almuerzosVendidos }}</li>
                        <li><strong>Cenas:</strong> {{ $cenasVendidas }}</li>
                    </ul>
                    <p><strong>Total de Bebidas Vendidas:</strong> {{ $bebidasVendidas->sum('cantidad') }}</p>
                </div>
            </div>
        </div>

        <!-- Gráfica de Comparación de Ganancias -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center" style="color: #004d40;">Comparación de Ganancias</h4>
                    <canvas id="chartComparacionGanancias"></canvas> <!-- Aquí está la gráfica -->
                </div>
            </div>
        </div>
    </div>

    <!-- Parte inferior: Menús vendidos y bebidas vendidas lado a lado -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Menús Vendidos</h5>
                </div>
                <div class="card-body">
                    @if($menuesVendidos->isNotEmpty())
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre del Menú</th>
                                    <th>Cantidad Vendida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menuesVendidos as $menu)
                                <tr>
                                    <td>{{ $menu['nombre'] }}</td>
                                    <td>{{ $menu['cantidad'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No se han vendido menús en este rango de fechas.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Bebidas vendidas -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Bebidas Vendidas</h5>
                </div>
                <div class="card-body">
                    @if($bebidasVendidas->isNotEmpty())
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre de la Bebida</th>
                                    <th>Cantidad Vendida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bebidasVendidas as $bebida)
                                <tr>
                                    <td>{{ $bebida['nombre'] }}</td>
                                    <td>{{ $bebida['cantidad'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No se han vendido bebidas en este rango de fechas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cargar Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    @if(isset($totalGananciasMesActual) && isset($totalGananciasMesAnterior))
    var ctxComparacion = document.getElementById('chartComparacionGanancias').getContext('2d');
    var chartComparacion = new Chart(ctxComparacion, {
        type: 'bar',
        data: {
            labels: ['Mes Actual', 'Mes Anterior'],
            datasets: [{
                label: 'Ganancias (Q)',
                data: [{{ $totalGananciasMesActual }}, {{ $totalGananciasMesAnterior }}],
                backgroundColor: ['#4BC0C0', '#FFCE56'],
                borderColor: ['#4BC0C0', '#FFCE56'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 2,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    @endif
</script>

<style>
    body {
        background-color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
        color: #004d40;
    }

    .card {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        border-radius: 15px;
    }

    .card-title, .card-header {
        font-size: 1.5rem;
        color: #004d40;
    }

    table th, table td {
        text-align: center;
    }

    .card-header {
        background-color: #004d40;
        color: white;
    }

    #chartComparacionGanancias {
        max-width: 100%;
        height: 400px;
        margin: auto;
    }
</style>
@endsection
