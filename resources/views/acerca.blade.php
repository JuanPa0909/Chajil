@extends('layout')

@section('content')
<div class="container py-5">
    <!-- Encabezado principal del parque -->
    <h1 class="text-center font-weight-bold mb-4 animate__animated animate__fadeInDown" style="color: #004d40;">Parque Ecológico Comunitario Chajil Siwan</h1>
    <p class="text-center text-muted mb-5 animate__animated animate__fadeInUp">Bienvenidos a la naturaleza viva de Totonicapán. Descubre más sobre nuestra misión, visión, valores y nuestra historia.</p>

    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 animate__animated animate__zoomIn" style="background-color: #004d40; color: white; border-radius: 15px;">
                <div class="card-body">
                    <i class="fas fa-leaf fa-3x mb-4" style="color: #b2dfdb;"></i> 
                    <h5 class="card-title font-weight-bold" style="color: #ffffff;">Nuestra Misión</h5>
                    <p class="card-text" style="color: #ffffff;">Ofrecer un lugar natural para recreación, aventura y servicio de alimentación de calidad a los visitantes, además de fomentar la protección y cuidado del medio ambiente y ser una alternativa para la mejora económica de la comunidad Chuamazan.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 animate__animated animate__zoomIn animate__delay-1s" style="background-color: #004d40; color: white; border-radius: 15px;">
                <div class="card-body">
                    <i class="fas fa-eye fa-3x mb-4" style="color: #b2dfdb;"></i> 
                    <h5 class="card-title font-weight-bold" style="color: #ffffff;">Nuestra Visión</h5>
                    <p class="card-text" style="color: #ffffff;">En el 2024 nuestro Parque es una opción única, interesante y agradable para la recreación del visitante, conservando y protegiendo los recursos naturales.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 animate__animated animate__zoomIn animate__delay-2s" style="background-color: #004d40; color: white; border-radius: 15px;">
                <div class="card-body">
                    <i class="fas fa-hands-helping fa-3x mb-4" style="color: #b2dfdb;"></i> 
                    <h5 class="card-title font-weight-bold" style="color: #ffffff;">Nuestros Valores</h5> 
                    <p class="card-text" style="color: #ffffff;">Compromiso, Respeto, Sustentabilidad y Educación para proteger nuestro entorno natural.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg animate__animated animate__fadeInUp" style="border-radius: 15px; overflow: hidden;">
                <img src="{{ asset('imagenes/entrada.jpg') }}" class="card-img-top" alt="Historia del Parque" style="height: 350px; object-fit: cover;">
                <div class="card-body" style="background-color: #e0f2f1;">
                    <h3 class="card-title font-weight-bold" style="color: #004d40;">Nuestra Historia</h3>

                    <hr class="my-4" style="border-top: 2px solid #004d40; width: 50%; margin: auto;">

                    <p class="card-text mt-4" style="color: #004d40;">
                        <i class="fas fa-tree mr-2"></i>El parque Ecológico Chajil Siwan forma parte de una iniciativa comunitaria que trabaja por la conservación de los bosques y nacimientos de agua. Chajil Siwan es dirigido por miembros de organizaciones locales que buscan conservar el bosque y construir con el desarrollo de la localidad.
                    </p>

                    <hr class="my-4" style="border-top: 2px solid #004d40; width: 70%; margin: auto;">

                    <p class="card-text mt-4" style="color: #004d40;">
                        <i class="fas fa-map-marker-alt mr-2"></i>El lugar se ubica en la comunidad Chuamazán, en el kilómetro 199 de la Carretera a Santa Cruz del Quiché, a 7 kilómetros de Totonicapán. El parque cuenta con árboles que tienen más de 300 años de antigüedad, sus senderos y miradores permiten a los amantes de la naturaleza tener contacto con las más variadas especies de flora y fauna por medio de avistamiento de aves.
                    </p>

                    <hr class="my-4" style="border-top: 2px solid #004d40; width: 90%; margin: auto;">

                    <p class="card-text mt-4" style="color: #004d40;">
                        <i class="fas fa-walking mr-2"></i>Además, para quienes disfrutan de la adrenalina, hay 225 metros de canopy, mientras que los más pequeños pueden divertirse en un área de juegos específica. También se puede acampar, disfrutar de puentes colgantes y fuentes de agua. Durante el recorrido por el bosque, los visitantes encuentran letreros que contienen información sobre los ejemplares propios del lugar.
                    </p>

                    <hr class="my-4" style="border-top: 2px solid #004d40; width: 100%; margin: auto;">

                    <p class="card-text mt-4" style="color: #004d40;">
                        <i class="fas fa-hand-holding-heart mr-2"></i>Al consumir en el parque Chajil Siwan contribuyes con la conservación de los bosques y apoyas la economía local.
                    </p>

                    <div class="text-center mt-5">
                        <a href="{{ route('home') }}" class="btn btn-outline-success btn-lg">Ir al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        font-size: 1.8rem;
    }

    h1 {
        font-size: 2.5rem;
        color: #004d40;
    }

    i {
        color: #b2dfdb;
    }

    .card-body p {
        font-size: 1.2rem;
        color: #004d40;
    }

    .btn-outline-success {
        border-color: #004d40;
        color: #004d40;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-outline-success:hover {
        background-color: #004d40;
        color: #ffffff;
    }

    /* Animaciones */
    .animate__animated {
        animation-duration: 1s;
        animation-fill-mode: both;
    }

    .animate__delay-1s {
        animation-delay: 0.5s;
    }

    .animate__delay-2s {
        animation-delay: 1s;
    }

    html {
        scroll-behavior: smooth;
    }
</style>

<!-- Cargar animaciones de Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

@endsection
