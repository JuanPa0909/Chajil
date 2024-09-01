@extends('layout')

@section('content')
<div class="container py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Cotizar Eventos en Línea</h1>
    <p class="text-center text-muted mb-5">Completa el siguiente formulario para obtener una cotización personalizada para tu evento.</p>

    <div class="row">
  
        <div class="col-md-7">
            <form>
                <div class="form-group">
                    <label for="tipoEvento" class="font-weight-bold">Tipo de Evento</label>
                    <select id="tipoEvento" class="form-control" required>
                        <option selected disabled>Selecciona el tipo de evento</option>
                        <option>Cumpleaños</option>
                        <option>Estudiantil</option>
                        <option>Conferencia</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaEvento" class="font-weight-bold">Fecha del Evento</label>
                    <input type="date" id="fechaEvento" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="horaEvento" class="font-weight-bold">Hora del Evento</label>
                    <input type="time" id="horaEvento" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numeroPersonas" class="font-weight-bold">Número de Personas</label>
                    <input type="number" id="numeroPersonas" class="form-control" min="1" required>
                </div>

                <h5 class="font-weight-bold mt-4" style="color: #004d40;">Opciones</h5>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="opcionSalon">
                    <label class="form-check-label" for="opcionSalon">Solo salón</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="opcionInmobiliario">
                    <label class="form-check-label" for="opcionInmobiliario">Salón con alquiler de inmobiliario</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="opcionComida">
                    <label class="form-check-label" for="opcionComida">Servicio de comida</label>
                </div>

                <div class="form-group mt-4">
                    <label for="detallesAdicionales" class="font-weight-bold">Detalles Adicionales</label>
                    <textarea id="detallesAdicionales" class="form-control" rows="4" placeholder="Escribe aquí cualquier detalle adicional..."></textarea>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-4" style="border-radius: 25px;">Solicitar Cotización</button>
            </form>
        </div>


        <div class="col-md-5">
            <div class="card border-0 shadow-lg" style="background-color: #004d40; color: white; border-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Instrucciones para la Cotización</h5>
                    <p class="card-text">Para cotizar tu evento, completa el formulario con la información requerida. Recuerda seleccionar las opciones adicionales si lo deseas:</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle"></i> Elige el tipo de evento.</li>
                        <li><i class="fas fa-check-circle"></i> Selecciona la fecha y hora deseada.</li>
                        <li><i class="fas fa-check-circle"></i> Indica el número de personas que asistirán.</li>
                        <li><i class="fas fa-check-circle"></i> Selecciona cualquier opción adicional.</li>
                        <li><i class="fas fa-check-circle"></i> Añade cualquier comentario o detalle adicional.</li>
                    </ul>
                    <p class="card-text">Una vez generada la cotización, te mostraremos el precio estimado para tu evento.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #e0f2f1, #b2dfdb);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-check-label {
        font-weight: bold;
        color: #004d40;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        font-size: 1.5rem;
    }

    h1 {
        font-size: 2.5rem;
        color: #004d40;
    }

    i {
        color: #b2dfdb;
    }

    .btn-success {
        background-color: #1b5e20;
        border: none;
    }

    .btn-success:hover {
        background-color: #2e7d32;
    }
</style>
@endsection
