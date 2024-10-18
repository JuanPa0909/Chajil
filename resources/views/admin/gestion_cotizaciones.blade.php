@extends('layout')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4" style="color: #00796b; font-weight: bold;">Gestión de Cotizaciones</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Tipo de Evento</th>
                <th>Fecha del Evento</th>
                <th>Hora del Evento</th>
                <th>Número de Personas</th>
                <th>Opción de Alquiler</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizaciones as $cotizacion)
            <tr>
                <td>{{ $cotizacion->id }}</td>
                <td>{{ $cotizacion->nombre_cliente }}</td>
                <td>{{ $cotizacion->email_cliente }}</td>
                <td>{{ $cotizacion->telefono_cliente }}</td>
                <td>{{ $cotizacion->tipo_evento }}</td>
                <td>{{ $cotizacion->fecha_evento }}</td>
                <td>{{ $cotizacion->hora_evento }}</td>
                <td>{{ $cotizacion->numero_personas }}</td>
                <td>Q{{ number_format($cotizacion->opcion_alquiler, 2) }}</td>
                <td>
                    <span class="badge {{ $cotizacion->estado == 'contactado' ? 'badge-success' : 'badge-warning' }}">
                        {{ ucfirst($cotizacion->estado) }}
                    </span>
                </td>
                <td>
                    <!-- Botón para marcar como contactado -->
                    @if($cotizacion->estado == 'pendiente')
                        <form action="{{ route('admin.cotizaciones.update', $cotizacion->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm">Marcar como Contactado</button>
                        </form>
                    @endif

                    <!-- Botón para eliminar -->
                    <form action="{{ route('admin.cotizaciones.destroy', $cotizacion->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cotización?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Estilos adicionales para el diseño de la tabla -->
<style>
    .badge-success {
        background-color: #28a745;
    }

    .badge-warning {
        background-color: #ffc107;
    }

    .table {
        margin-top: 20px;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .btn-primary {
        margin-right: 10px;
    }
</style>
@endsection
