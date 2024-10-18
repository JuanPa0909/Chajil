@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold mb-4">Gestión de Pagos</h1>

    <!-- Formulario para buscar pagos por un día específico -->
    <form action="{{ route('admin.gestion-pagos') }}" method="GET" class="mb-5">
        <div class="row">
            <div class="col-md-4">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" class="form-control" value="{{ $fecha }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Buscar Pagos</button>
            </div>
        </div>
    </form>

    @if(isset($pagos) || isset($pagosActividades))
        <h3>Pagos de la Tabla Pagos:</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Pago</th>
                        <th>ID Pedido</th>
                        <th>Monto</th>
                        <th>Método de Pago</th>
                        <th>Fecha de Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagos as $pago)
                        <tr>
                            <td>{{ $pago->id }}</td>
                            <td>{{ $pago->id_pedido }}</td>
                            <td>
                                <input type="number" id="monto-{{ $pago->id }}" value="{{ $pago->monto }}" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" id="metodo-{{ $pago->id }}" value="{{ $pago->metodo_pago }}" class="form-control" disabled>
                            </td>
                            <td>{{ $pago->fecha_pago }}</td>
                            <td>
                                <button class="btn btn-info" onclick="habilitarEdicion('{{ $pago->id }}')">Editar</button>
                                <form action="{{ url('admin/actualizar-pago/' . $pago->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="monto" id="input-monto-{{ $pago->id }}">
                                    <input type="hidden" name="metodo_pago" id="input-metodo-{{ $pago->id }}">
                                    <button type="submit" class="btn btn-success" id="guardar-{{ $pago->id }}" style="display:none;" onclick="return confirmarActualizacion()">Guardar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3>Pagos de la Tabla Pago Actividades:</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Pago</th>
                        <th>ID Actividad</th>
                        <th>ID Usuario</th>
                        <th>Cantidad Tickets</th>
                        <th>Monto</th>
                        <th>Fecha de Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagosActividades as $pagoActividad)
                        <tr>
                            <td>{{ $pagoActividad->id }}</td>
                            <td>{{ $pagoActividad->id_actividad }}</td>
                            <td>{{ $pagoActividad->id_usuario }}</td>
                            <td>
                                <input type="number" id="cantidad-{{ $pagoActividad->id }}" value="{{ $pagoActividad->cantidadTickets }}" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="number" id="monto-{{ $pagoActividad->id }}" value="{{ $pagoActividad->monto }}" class="form-control" disabled>
                            </td>
                            <td>{{ $pagoActividad->fecha_hora }}</td>
                            <td>
                                <button class="btn btn-info" onclick="habilitarEdicion('{{ $pagoActividad->id }}')">Editar</button>
                                <form action="{{ url('admin/actualizar-pago/' . $pagoActividad->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="monto" id="input-monto-{{ $pagoActividad->id }}">
                                    <input type="hidden" name="cantidadTickets" id="input-cantidad-{{ $pagoActividad->id }}">
                                    <button type="submit" class="btn btn-success" id="guardar-{{ $pagoActividad->id }}" style="display:none;" onclick="return confirmarActualizacion()">Guardar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center">No se encontraron pagos en la fecha seleccionada.</p>
    @endif
</div>

<!-- Script para habilitar edición y guardar cambios -->
<script>
function habilitarEdicion(id) {
    document.getElementById('monto-' + id).disabled = false;
    document.getElementById('metodo-' + id).disabled = false;
    document.getElementById('guardar-' + id).style.display = 'inline-block';
}

function confirmarActualizacion() {
    return confirm('¿Está seguro de que desea guardar los cambios?');
}
</script>

@endsection
