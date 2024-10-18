@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold mb-4" style="color: #004d40;">Reporte de Actividades</h1>
    <p class="text-center text-muted mb-5">Consulta y filtra los pagos realizados por actividad.</p>

    <!-- Formulario de Filtro por Día o Mes -->
    <form action="{{ route('admin.reporte-actividades') }}" method="GET" id="formFiltro">
        <div class="row justify-content-center mb-4">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tipo_filtro">Filtro por:</label>
                    <select id="tipo_filtro" name="tipo_filtro" class="form-control" required>
                        <option value="dia" {{ request('tipo_filtro') == 'dia' ? 'selected' : '' }}>Día</option>
                        <option value="mes" {{ request('tipo_filtro') == 'mes' ? 'selected' : '' }}>Mes</option>
                    </select>
                </div>
            </div>

            <!-- Selector de Fecha (para filtro por día) -->
            <div class="col-md-4" id="filtro_dia" style="{{ request('tipo_filtro') == 'dia' ? '' : 'display: none;' }}">
                <div class="form-group">
                    <label for="fecha_dia">Fecha</label>
                    <input type="date" name="fecha_dia" class="form-control" value="{{ request('fecha_dia') ?? '' }}">
                </div>
            </div>

            <!-- Selector de Rango de Fechas (para filtro por mes) -->
            <div class="col-md-4" id="filtro_mes" style="{{ request('tipo_filtro') == 'mes' ? '' : 'display: none;' }}">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha Fin</label>
                    <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') ?? '' }}">
                </div>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Botón para generar el PDF -->
    <div class="text-right mb-4">
        <a href="{{ route('admin.reporte-actividades.pdf', [
                'tipo_filtro' => request('tipo_filtro'), 
                'fecha_dia' => request('fecha_dia'), 
                'fecha_inicio' => request('fecha_inicio'), 
                'fecha_fin' => request('fecha_fin')]) }}" 
           class="btn btn-primary">
           Descargar PDF
        </a>
    </div>

    <!-- Parte superior: Resumen general -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card text-center mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3" style="color: #004d40;">Resumen de Pagos por Actividad</h4>
                    <p><strong>Total de Actividades Pagadas:</strong> {{ $totalActividades }}</p>
                    <p><strong>Ingresos Totales:</strong> Q{{ number_format($totalIngresos, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Parte inferior: Desglose por Actividad -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
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
    </div>
</div>

<!-- Script para mostrar/ocultar campos de fecha según el tipo de filtro -->
<script>
    document.getElementById('tipo_filtro').addEventListener('change', function() {
        if (this.value === 'dia') {
            document.getElementById('filtro_dia').style.display = '';
            document.getElementById('filtro_mes').style.display = 'none';
        } else {
            document.getElementById('filtro_dia').style.display = 'none';
            document.getElementById('filtro_mes').style.display = '';
        }
    });
</script>
@endsection
