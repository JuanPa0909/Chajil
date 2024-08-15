@extends('layout')

@section('content')
<!-- Hero Section -->
<div class="hero text-center text-light d-flex align-items-center justify-content-center" style="height: 500px; background: url('{{ asset('imagenes/puente.jpg') }}') no-repeat center center; background-size: cover;">
    <div style="background-color: rgba(0, 77, 64, 0.7); padding: 20px; border-radius: 15px;">
        <h1 class="display-4">Bienvenido a Chajil Siwan</h1>
        <p class="lead">Parque Ecológico Comunitario - Aventura entre Bosques</p>
    </div>
</div>

<!-- Main Content -->
<div class="content mt-5" style="background-color: #e0f2f1;">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4" style="background-color: #004d40; color: white;">
                <div class="card-body">
                    <h2 class="card-title">Acerca de Nosotros</h2>
                    <p class="card-text">Descubre más sobre nuestra misión y visión.</p>
                    <a href="#" class="btn btn-light">Leer más</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4" style="background-color: #004d40; color: white;">
                <div class="card-body">
                    <h2 class="card-title">Eventos</h2>
                    <p class="card-text">Entérate de nuestros próximos eventos y actividades.</p>
                    <a href="#" class="btn btn-light">Ver eventos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm mb-4" style="background-color: #004d40; color: white;">
                <div class="card-body">
                    <h2 class="card-title">Contacto</h2>
                    <p class="card-text">¿Tienes alguna pregunta? ¡Contáctanos!</p>
                    <a href="#" class="btn btn-light">Contáctanos</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Galería -->
    <div class="gallery my-5">
        <h2 class="text-center" style="color: #004d40;">Galería</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <img src="{{ asset('imagenes/imagen1.jpg') }}" class="img-fluid rounded shadow" alt="Imagen del parque">
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('imagenes/imagen2.jpg') }}" class="img-fluid rounded shadow" alt="Imagen del parque">
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('imagenes/imagen3.jpg') }}" class="img-fluid rounded shadow" alt="Imagen del parque">
            </div>
        </div>
    </div>

    <!-- Misión y Visión -->
    <div class="row my-5">
        <div class="col-md-6">
            <h2 style="color: #004d40;">Misión</h2>
            <p>Nuestra misión es preservar la biodiversidad del parque mientras ofrecemos un espacio de recreación y aprendizaje sobre la naturaleza.</p>
        </div>
        <div class="col-md-6">
            <h2 style="color: #004d40;">Visión</h2>
            <p>Nuestra visión es ser un referente en conservación ambiental y educación ecológica, promoviendo la sustentabilidad y el respeto por la naturaleza.</p>
        </div>
    </div>

    <!-- Horarios y Tarifas -->
    <div class="row my-5">
        <div class="col-md-12">
            <h2 class="text-center" style="color: #004d40;">Horarios y Tarifas</h2>
            <p class="text-center">Consulta nuestros horarios de apertura y tarifas para disfrutar de todas las actividades que ofrecemos en Chajil Siwan.</p>
            <table class="table table-bordered table-hover mt-4">
                <thead style="background-color: #004d40; color: white;">
                    <tr>
                        <th scope="col">Día</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Tarifa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lunes a Viernes</td>
                        <td>8:00 AM - 5:00 PM</td>
                        <td>Q30.00</td>
                    </tr>
                    <tr>
                        <td>Sábados y Domingos</td>
                        <td>8:00 AM - 6:00 PM</td>
                        <td>Q50.00</td>
                    </tr>
                    <tr>
                        <td>Festivos</td>
                        <td>8:00 AM - 6:00 PM</td>
                        <td>Q50.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Normas del Parque -->
    <div class="row my-5">
        <div class="col-md-12">
            <h2 class="text-center" style="color: #004d40;">Normas del Parque</h2>
            <p class="text-center">Para asegurar que todos los visitantes tengan una experiencia segura y agradable, te pedimos que sigas estas normas:</p>
            <ul class="list-group list-group-flush mt-4">
                <li class="list-group-item">1. No se permite la entrada de alimentos y bebidas.</li>
                <li class="list-group-item">2. Respeta la flora y fauna del parque.</li>
                <li class="list-group-item">3. No arrojes basura, utiliza los contenedores disponibles.</li>
                <li class="list-group-item">4. Mantén el volumen bajo para no alterar el ambiente natural.</li>
                <li class="list-group-item">5. Sigue las indicaciones del personal del parque.</li>
            </ul>
        </div>
    </div>

    <!-- Mapa de Ubicación -->
    <div class="map my-5">
        <h2 class="text-center" style="color: #004d40;">¿Dónde Estamos?</h2>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.454514963208!2d-91.45752768518444!3d14.935589990087266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x858dbf498741333d%3A0x4b64784c88df0ba9!2sWMMC%2BPR3%2C%20Totonicap%C3%A1n!5e0!3m2!1ses!2sgt!4v1692648796638!5m2!1ses!2sgt" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</div>
@endsection
