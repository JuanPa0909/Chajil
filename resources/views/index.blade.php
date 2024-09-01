@extends('layout')

@section('content')
<!-- Hero Section con Efecto Parallax -->
<div class="hero text-center d-flex align-items-center justify-content-center" style="height: 500px; background: url('{{ asset('imagenes/imagen1.jpeg') }}') no-repeat center center fixed; background-size: cover;">
    <div style="background-color: rgba(34, 73, 87, 0.75); padding: 30px; border-radius: 15px;">
        <h1 class="display-4 text-white font-weight-bold">Bienvenido a Chajil Siwan</h1>
        <p class="lead text-white">Parque Ecológico Comunitario - Aventura entre Bosques</p>
        <a href="#sobre-nosotros" class="btn btn-light btn-lg mt-4" style="border-radius: 25px;">Descubre Más</a>
    </div>
</div>


<div id="sobre-nosotros" class="content py-5" style="background-color: #f5f7f6;">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col">
                <h2 class="font-weight-bold" style="color: #225b60;">Acerca de Nosotros</h2>
                <p class="text-muted">Descubre nuestra misión, visión y valores.</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card shadow-sm mb-4 border-0" style="background-color: #225b60; color: white; border-radius: 12px;">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Nuestra Misión</h3>
                        <p class="card-text">Preservar la biodiversidad del parque mientras ofrecemos un espacio de recreación y aprendizaje sobre la naturaleza.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4 border-0" style="background-color: #225b60; color: white; border-radius: 12px;">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Nuestra Visión</h3>
                        <p class="card-text">Ser un referente en conservación ambiental y educación ecológica, promoviendo la sustentabilidad y el respeto por la naturaleza.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4 border-0" style="background-color: #225b60; color: white; border-radius: 12px;">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Nuestros Valores</h3>
                        <p class="card-text">Compromiso, Respeto, Sustentabilidad y Educación para proteger nuestro entorno natural.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="gallery my-5">
    <div class="container">
        <h2 class="text-center font-weight-bold mb-5" style="color: #004d40;">Galería</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="max-height: 400px;">
                <div class="carousel-item active">
                    <img src="{{ asset('imagenes/imagen1.jpeg') }}" class="d-block w-100 rounded shadow-sm" alt="Imagen 1" style="object-fit: cover; height: 400px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenes/imagen2.jpeg') }}" class="d-block w-100 rounded shadow-sm" alt="Imagen 2" style="object-fit: cover; height: 400px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenes/imagen3.jpeg') }}" class="d-block w-100 rounded shadow-sm" alt="Imagen 3" style="object-fit: cover; height: 400px;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
</div>


<div class="cta-section text-center py-5" style="background-color: #225b60; color: white;">
    <h2 class="font-weight-bold mb-4">¿Listo para tu Aventura?</h2>
    <p class="lead">Reserva tu visita y prepárate para una experiencia inolvidable en Chajil Siwan.</p>
    <a href="{{ route('reservaciones') }}" class="btn btn-light btn-lg" style="border-radius: 25px;">Reserva Ahora</a>
</div>


<div class="map my-5">
    <h2 class="text-center font-weight-bold" style="color: #225b60;">¿Dónde Estamos?</h2>
    <div class="embed-responsive embed-responsive-16by9 shadow-sm" style="border-radius: 12px;">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.454514963208!2d-91.45752768518444!3d14.935589990087266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x858dbf498741333d%3A0x4b64784c88df0ba9!2sWMMC%2BPR3%2C%20Totonicap%C3%A1n!5e0!3m2!1ses!2sgt!4v1692648796638!5m2!1ses!2sgt" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection
