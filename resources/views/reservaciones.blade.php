@extends('layout')

@section('content')
<div class="container py-5" style="background-color: #ffffff; border-radius: 15px; padding: 40px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center font-weight-bold mb-4" style="color: #004d40;">Cotizar Eventos en Línea</h1>

    <div class="row">
        <!-- Instrucciones lado izquierdo -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg" style="background-color: #004d40; color: white; border-radius: 15px;">
                <div class="card-body">
                    <h4 class="font-weight-bold">Instrucciones</h4>
                    <p class="card-text">Sigue los pasos para completar tu cotización:</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle"></i> Selecciona el tipo de evento.</li>
                        <li><i class="fas fa-check-circle"></i> Escoge la fecha y hora del evento.</li>
                        <li><i class="fas fa-check-circle"></i> Indica el número de personas.</li>
                        <li><i class="fas fa-check-circle"></i> Selecciona las opciones de alquiler.</li>
                        <li><i class="fas fa-check-circle"></i> Elige si deseas incluir servicio de comida.</li>
                        <li><i class="fas fa-check-circle"></i> Revisa las sugerencias de menús y selecciona tus preferencias.</li>
                        <li><i class="fas fa-check-circle"></i> Obtén tu cotización final.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Formulario de Cotización -->
        <div class="col-md-8">
            <form action="{{ route('reservaciones.procesar') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tipoEvento" class="font-weight-bold">Tipo de Evento</label>
                    <select id="tipoEvento" name="tipoEvento" class="form-control" required>
                        <option selected disabled>Selecciona el tipo de evento</option>
                        <option value="Cumpleaños">Cumpleaños</option>
                        <option value="Estudiantil">Estudiantil</option>
                        <option value="Conferencia">Conferencia</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaEvento" class="font-weight-bold">Fecha del Evento</label>
                    <input type="date" id="fechaEvento" name="fechaEvento" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="horaEvento" class="font-weight-bold">Hora del Evento</label>
                    <input type="time" id="horaEvento" name="horaEvento" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numeroPersonas" class="font-weight-bold">Número de Personas</label>
                    <input type="number" id="numeroPersonas" name="numeroPersonas" class="form-control" min="1" required>
                </div>

                <h5 class="font-weight-bold mt-4" style="color: #004d40;">Opciones de Alquiler</h5>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="opcionAlquiler" id="opcionSalonSillasMesas" value="450" required>
                    <label class="form-check-label" for="opcionSalonSillasMesas">Salón pequeño con alquiler de sillas y mesas - Q450</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="opcionAlquiler" id="opcionSalonSinNada" value="2000" required>
                    <label class="form-check-label" for="opcionSalonSinNada">Alquiler del salón sin mobiliario - Q2000</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="opcionAlquiler" id="opcionSalonCompleto" value="1950" required>
                    <label class="form-check-label" for="opcionSalonCompleto">Salón con mobiliario completo (mesas, sillas y manteles) - Q1950</label>
                </div>

                <h5 class="font-weight-bold mt-4" style="color: #004d40;">¿Desea Servicio de Comida?</h5>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="servicioComida" id="servicioComidaSi" value="si" required>
                    <label class="form-check-label" for="servicioComidaSi">Sí</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="servicioComida" id="servicioComidaNo" value="no" required>
                    <label class="form-check-label" for="servicioComidaNo">No</label>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-4" style="border-radius: 25px;">Sugerir Menús</button>
            </form>
        </div>
    </div>

    <!-- Mostrar sugerencias de menú y cotización -->
    @isset($sugerencias)
    <form action="{{ route('reservaciones.calcularTotal') }}" method="POST">
        @csrf
        <div class="mt-5">
            <h3 class="text-center" style="color: #004d40;">Sugerencias de Menús</h3>
            <div class="row">
                @isset($sugerencias['desayuno'])
                <div class="col-md-4">
                    <h5 class="text-center">Desayunos</h5>
                    <ul class="list-group">
                        @foreach($sugerencias['desayuno'] as $menu)
                        <li class="list-group-item">
                            <input type="checkbox" name="menusSeleccionados[]" value="{{ $menu->id_menu }}">
                            {{ $menu->nombre }} - Q{{ $menu->precio }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endisset

                @isset($sugerencias['almuerzo'])
                <div class="col-md-4">
                    <h5 class="text-center">Almuerzos</h5>
                    <ul class="list-group">
                        @foreach($sugerencias['almuerzo'] as $menu)
                        <li class="list-group-item">
                            <input type="checkbox" name="menusSeleccionados[]" value="{{ $menu->id_menu }}">
                            {{ $menu->nombre }} - Q{{ $menu->precio }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endisset

                @isset($sugerencias['refaccion'])
                <div class="col-md-4">
                    <h5 class="text-center">Refacciones</h5>
                    <ul class="list-group">
                        @foreach($sugerencias['refaccion'] as $menu)
                        <li class="list-group-item">
                            <input type="checkbox" name="menusSeleccionados[]" value="{{ $menu->id_menu }}">
                            {{ $menu->nombre }} - Q{{ $menu->precio }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endisset
            </div>
        </div>

        <input type="hidden" name="numeroPersonas" value="{{ $datos['numeroPersonas'] }}">
        <input type="hidden" name="opcionAlquiler" value="{{ $datos['opcionAlquiler'] }}">

        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 25px;">Calcular Costo Total</button>
        </div>
    </form>
    @endisset

    <!-- Mostrar costo total calculado -->
    @isset($costoTotal)
    <div class="text-center mt-5">
        <h4 class="font-weight-bold" style="color: #004d40;">Costo Total Estimado: Q{{ number_format($costoTotal, 2) }}</h4>
    </div>
    @endisset
</div>

<style>
    body {
        background-color: #ffffff;
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

    .btn-success {
        background-color: #1b5e20;
        border: none;
    }

    .btn-success:hover {
        background-color: #2e7d32;
    }

    .btn-primary {
        background-color: #1976d2;
        border: none;
    }

    .btn-primary:hover {
        background-color: #1565c0;
    }
</style>
@endsection
