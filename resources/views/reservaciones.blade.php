@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Instrucciones a la izquierda -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <h4 class="text-center mb-4" style="color: #00796b; font-weight: bold;">Instrucciones</h4>
                    <p>Sigue los pasos para solicitar una cotización para tu evento:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1. Ingresa tu información personal.</li>
                        <li class="list-group-item">2. Proporciona detalles sobre tu evento.</li>
                        <li class="list-group-item">3. Selecciona la opción de alquiler que mejor se adapte a tus necesidades.</li>
                        <li class="list-group-item">4. Elige una hora entre las 7:00 AM y las 6:00 PM.</li>
                        <li class="list-group-item">5. No puedes escoger una fecha anterior a la actual.</li>
                        <li class="list-group-item">6. Envía el formulario y te contactaremos para confirmar los detalles.</li>
                    </ul>
                    <div class="alert alert-info mt-4" role="alert">
                        <p class="mb-0">Todos los campos son obligatorios.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario a la derecha -->
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-5">
                    <h1 class="text-center mb-4" style="color: #00796b; font-weight: bold;">Solicitar Cotización</h1>

                    <form id="cotizacionForm" action="{{ route('reservaciones.procesar') }}" method="POST" onsubmit="return validateForm()">
                        @csrf

                        <!-- Información del Cliente -->
                        <h4 class="mb-3" style="color: #004d40; font-weight: bold;">Datos del Cliente</h4>
                        <div class="form-group mb-3">
                            <label for="nombreCliente" class="font-weight-bold">Nombre Completo <i class="fas fa-user"></i></label>
                            <input type="text" id="nombreCliente" name="nombreCliente" class="form-control rounded-pill" placeholder="Escribe tu nombre completo" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="emailCliente" class="font-weight-bold">Correo Electrónico <i class="fas fa-envelope"></i></label>
                            <input type="email" id="emailCliente" name="emailCliente" class="form-control rounded-pill" placeholder="example@correo.com" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="telefonoCliente" class="font-weight-bold">Teléfono <i class="fas fa-phone"></i></label>
                            <input type="tel" id="telefonoCliente" name="telefonoCliente" class="form-control rounded-pill" placeholder="123-456-7890" required>
                        </div>

                        <!-- Información del Evento -->
                        <h4 class="mb-3 mt-4" style="color: #004d40; font-weight: bold;">Datos del Evento</h4>

                        <div class="form-group mb-3">
                            <label for="tipoEvento" class="font-weight-bold">Tipo de Evento <i class="fas fa-calendar"></i></label>
                            <select id="tipoEvento" name="tipoEvento" class="form-control rounded-pill" required>
                                <option selected disabled>Selecciona el tipo de evento</option>
                                <option value="Cumpleaños">Cumpleaños</option>
                                <option value="Estudiantil">Estudiantil</option>
                                <option value="Conferencia">Conferencia</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fechaEvento" class="font-weight-bold">Fecha del Evento <i class="fas fa-calendar-alt"></i></label>
                            <input type="date" id="fechaEvento" name="fechaEvento" class="form-control rounded-pill" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="horaEvento" class="font-weight-bold">Hora del Evento <i class="fas fa-clock"></i></label>
                            <input type="time" id="horaEvento" name="horaEvento" class="form-control rounded-pill" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="numeroPersonas" class="font-weight-bold">Número de Personas <i class="fas fa-users"></i></label>
                            <input type="number" id="numeroPersonas" name="numeroPersonas" class="form-control rounded-pill" min="1" placeholder="Cantidad de personas" required>
                        </div>

                        <!-- Opciones de Alquiler -->
                        <h4 class="mb-3 mt-4" style="color: #004d40; font-weight: bold;">Opciones de Alquiler</h4>

                        <div class="form-check mb-2">
                            <input type="radio" class="form-check-input" name="opcionAlquiler" id="opcionSalonSillasMesas" value="450" required>
                            <label class="form-check-label" for="opcionSalonSillasMesas">Salón pequeño con sillas y mesas</label>
                        </div>

                        <div class="form-check mb-2">
                            <input type="radio" class="form-check-input" name="opcionAlquiler" id="opcionSalonSinNada" value="2000" required>
                            <label class="form-check-label" for="opcionSalonSinNada">Alquiler sin mobiliario</label>
                        </div>

                        <div class="form-check mb-4">
                            <input type="radio" class="form-check-input" name="opcionAlquiler" id="opcionSalonCompleto" value="1950" required>
                            <label class="form-check-label" for="opcionSalonCompleto">Salón completo (con mobiliario)</label>
                        </div>

                        <!-- Botón de Enviar -->
                        <button type="submit" class="btn btn-success btn-block rounded-pill" style="background-color: #388e3c; border: none; font-size: 1.2rem;">Enviar Solicitud</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de alerta de validación -->
<div class="modal fade" id="horaErrorModal" tabindex="-1" role="dialog" aria-labelledby="horaErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="horaErrorModalLabel">Error en la hora seleccionada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                La hora seleccionada debe estar entre las <strong>7:00 AM</strong> y las <strong>6:00 PM</strong>. Por favor, ajusta la hora de tu evento.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    body {
        background-image: url('https://source.unsplash.com/1600x900/?event,celebration');  /* Imagen de fondo estática */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        background-color: #f8f9fa;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        padding: 30px;
    }

    .form-check-label {
        font-weight: bold;
        color: #00796b;
    }

    .card-body h1, h4 {
        text-transform: uppercase;
    }

    .btn-success:hover {
        background-color: #2e7d32;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .rounded-pill {
        border-radius: 50px;
    }

    .fas {
        margin-right: 5px;
    }

    .alert-info {
        background-color: #e3f2fd;
        color: #004d40;
        font-size: 1rem;
    }

    .list-group-item {
        background-color: transparent;
        border: none;
    }
</style>

<!-- Validaciones con JavaScript y Modal de Bootstrap -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fechaEventoInput = document.getElementById('fechaEvento');
        const horaEventoInput = document.getElementById('horaEvento');

        // Establecer la fecha mínima como la fecha actual
        const today = new Date().toISOString().split('T')[0];
        fechaEventoInput.setAttribute('min', today);

        // Validar el formulario en el envío
        document.getElementById('cotizacionForm').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    });

    function validateForm() {
        const horaEvento = document.getElementById('horaEvento').value;

        // Validar que la hora esté entre las 7:00 AM y 6:00 PM
        if (horaEvento < '07:00' || horaEvento > '18:00') {
            $('#horaErrorModal').modal('show'); // Mostrar el modal de error
            return false;
        }

        return true;
    }
</script>

<!-- Integración de Bootstrap JS (opcional si ya está cargado en tu plantilla) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
