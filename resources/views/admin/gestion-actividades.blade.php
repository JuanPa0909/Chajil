@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Gestión de Actividades</h1>
    <p class="text-center text-muted mb-5">Aquí puedes gestionar las actividades del parque.</p>

    <!-- Botón para agregar nueva actividad -->
    <div class="d-flex justify-content-center mb-4">
        <button class="btn btn-primary" onclick="mostrarFormulario('agregar')">Agregar Nueva Actividad</button>
    </div>

    <!-- Formulario para agregar o editar actividad -->
    <div id="formulario_actividad" class="mb-4">
        <h2 id="titulo_formulario">Agregar Actividad</h2>
        <form id="actividadForm" method="POST" action="{{ route('admin.store-actividad') }}">
            @csrf
            <input type="hidden" name="_method" id="form_method" value="POST">
            <input type="hidden" id="actividad_id" name="id">
            <div class="card border-0 shadow-lg mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre de la Actividad</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="costo">Costo (Q)</label>
                        <input type="number" id="costo" name="costo" class="form-control" step="0.01" required>
                    </div>

                    <button type="button" class="btn btn-success" id="boton_formulario" onclick="validarFormulario()">Agregar Actividad</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Listar actividades existentes -->
    <h2 class="text-center font-weight-bold mb-4" style="color: #004d40;">Actividades Existentes</h2>
    @foreach($actividades as $actividad)
    <div class="card border-0 shadow-lg mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5>{{ $actividad->nombre }} - Q{{ number_format($actividad->costo, 2) }}</h5>
            <div>
                <button class="btn btn-warning btn-sm mx-1" onclick="editarActividad({{ $actividad->id_actividad }}, '{{ $actividad->nombre }}', '{{ $actividad->descripcion }}', {{ $actividad->costo }})">Editar</button>

                <form action="{{ route('admin.delete-actividad', $actividad->id_actividad) }}" method="POST" style="display:inline;" onsubmit="return confirmarEliminar(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p>{{ $actividad->descripcion }}</p>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal de confirmación -->
<div class="modal fade" id="confirmacionModal" tabindex="-1" role="dialog" aria-labelledby="confirmacionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacionModalLabel">Confirmar acción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalMensaje">¿Estás seguro de realizar esta acción?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmarAccion">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Mostrar el formulario y limpiar los campos
    function mostrarFormulario(tipo, id = null) {
        limpiarFormulario();
        document.getElementById('actividad_id').value = id ? id : '';
        if (tipo === 'agregar') {
            document.getElementById('titulo_formulario').innerText = 'Agregar Actividad';
            document.getElementById('boton_formulario').innerText = 'Agregar Actividad';
            document.getElementById('actividadForm').action = '{{ route('admin.store-actividad') }}';
            document.getElementById('form_method').value = 'POST';
        } else {
            document.getElementById('titulo_formulario').innerText = 'Editar Actividad';
            document.getElementById('boton_formulario').innerText = 'Guardar Cambios';
            document.getElementById('actividadForm').action = '{{ route('admin.update-actividad', '') }}/' + id;
            document.getElementById('form_method').value = 'PUT';
        }

        // Llevar el foco al formulario
        document.getElementById('formulario_actividad').scrollIntoView({ behavior: 'smooth' });
    }

    // Limpiar los campos del formulario
    function limpiarFormulario() {
        document.getElementById('nombre').value = '';
        document.getElementById('descripcion').value = '';
        document.getElementById('costo').value = '';
    }

    // Rellenar el formulario con datos de una actividad existente para editarla
    function editarActividad(id, nombre, descripcion, costo) {
        mostrarFormulario('editar', id);
        document.getElementById('nombre').value = nombre;
        document.getElementById('descripcion').value = descripcion;
        document.getElementById('costo').value = costo;
    }

    // Validar el formulario antes de enviarlo
    function validarFormulario() {
        const nombre = document.getElementById('nombre').value.trim();
        const costo = document.getElementById('costo').value;

        if (nombre === '') {
            alert('El nombre de la actividad es obligatorio.');
            return;
        }

        if (costo <= 0) {
            alert('El costo debe ser mayor a 0.');
            return;
        }

        // Mostrar modal de confirmación antes de enviar el formulario
        document.getElementById('modalMensaje').innerText = '¿Estás seguro de que deseas agregar/editar esta actividad?';
        $('#confirmacionModal').modal('show');

        document.getElementById('confirmarAccion').onclick = function() {
            document.getElementById('actividadForm').submit();
        };
    }

    // Confirmación antes de eliminar
    function confirmarEliminar(event) {
        event.preventDefault(); // Evitar que se envíe el formulario directamente

        document.getElementById('modalMensaje').innerText = '¿Estás seguro de que deseas eliminar esta actividad?';
        $('#confirmacionModal').modal('show');

        document.getElementById('confirmarAccion').onclick = function() {
            event.target.submit(); // Enviar el formulario de eliminación
        };
    }

    // Limpiar formulario después de acciones exitosas
    document.getElementById('actividadForm').addEventListener('submit', function() {
        limpiarFormulario();
    });
</script>

@endsection
