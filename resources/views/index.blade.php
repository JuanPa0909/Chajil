@extends('layout')

@section('content')
<div class="hero text-center d-flex align-items-center justify-content-center" style="height: 100vh; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('imagenes/puente.jpg') }}') no-repeat center center; background-size: cover; position: relative;">
    <div class="overlay animate__animated animate__fadeIn" style="padding: 50px; border-radius: 15px; box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px);">
        <h1 class="display-4 text-white font-weight-bold animate__animated animate__fadeInDown">Bienvenido a Chajil Siwan</h1>
        <p class="lead text-white animate__animated animate__fadeInUp delay-2s">Parque Ecológico Comunitario - Aventura entre Bosques</p>
        <a href="#donaciones" class="btn btn-outline-light btn-lg mt-4 animate__animated animate__zoomIn" style="border-radius: 50px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3); transition: all 0.3s ease;">Descubre Más</a>
    </div>
</div>

<div id="donaciones" class="content py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('imagenes/panoramica.JPG') }}" class="img-fluid rounded shadow-lg" alt="Donaciones">
            </div>
            <div class="col-md-6">
                <h2 class="font-weight-bold mb-4" style="color: #225b60; font-size: 2.5rem;">Entrada al Parque</h2>
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Ingreso por persona</td>
                            <td class="text-center" style="background-color: #f9f9d2;">Q10.00</td>
                        </tr>
                        <tr>
                            <td>Turistas</td>
                            <td class="text-center" style="background-color: #f9f9d2;">Q15.00</td>
                        </tr>
                        <tr>
                            <td>Parqueo</td>
                            <td class="text-center" style="background-color: #f9f9d2;">Gratis</td>
                        </tr>
                        <tr>
                            <td>Guía en senderos</td>
                            <td class="text-center" style="background-color: #f9f9d2;">Incluido</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-muted">- La entrada al Parque incluye visita guiada en senderos y estacionamiento gratuito.</p>
            </div>
        </div>
    </div>
</div>

<!-- Sección de la Galería -->
<h2 class="text-center font-weight-bold mb-4" style="color: #225b60; font-size: 2.5rem;">Galería</h2>

<div class="gallery my-5" style="margin-bottom: 80px;">
    <div class="container" style="max-width: 900px;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!-- Indicadores personalizados -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="background-color: #225b60; width: 12px; height: 12px; border-radius: 50%;"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1" style="background-color: #225b60; width: 12px; height: 12px; border-radius: 50%;"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2" style="background-color: #225b60; width: 12px; height: 12px; border-radius: 50%;"></li>
            </ol>

            <div class="carousel-inner">
                <!-- Ajuste de tamaño para las imágenes -->
                <div class="carousel-item active">
                    <img src="{{ asset('imagenes/entrada.jpg') }}" class="d-block w-100" alt="Imagen 1" style="object-fit: cover; height: 500px; transition: transform 0.5s ease;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenes/sendero.jpg') }}" class="d-block w-100" alt="Imagen 2" style="object-fit: cover; height: 500px; transition: transform 0.5s ease;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenes/puente.jpg') }}" class="d-block w-100" alt="Imagen 3" style="object-fit: cover; height: 500px; transition: transform 0.5s ease;">
                </div>
            </div>

            <!-- Botones de navegación personalizados -->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="width: 5%; height: 100%;">
                <span class="carousel-control-prev-icon bg-dark p-3 rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="width: 5%; height: 100%;">
                <span class="carousel-control-next-icon bg-dark p-3 rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
</div>

<div class="more-chajil-section py-5" style="background-color: #f8fafc;">
    <div class="container">
        <h2 class="text-center font-weight-bold mb-5" style="color: #225b60; font-size: 2.5rem;">Más de Chajil Siwan</h2>
        <div class="row text-center">
            <!-- Fauna y Flora -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow-lg" style="border-radius: 15px;">
                    <i class="fas fa-dove" style="color: #225b60; font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color: #225b60;">Fauna y Flora</h4>
                </div>
            </div>
            <!-- Eventos -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow-lg" style="border-radius: 15px;">
                    <i class="fas fa-calendar-alt" style="color: #225b60; font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color: #225b60;">Eventos</h4>
                </div>
            </div>
            <!-- Observación de Aves -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow-lg" style="border-radius: 15px;">
                    <i class="fas fa-binoculars" style="color: #225b60; font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color: #225b60;">Observación de Aves</h4>
                </div>
            </div>
            <!-- Camping -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow-lg" style="border-radius: 15px;">
                    <i class="fas fa-campground" style="color: #225b60; font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color: #225b60;">Camping</h4>
                </div>
            </div>
            <!-- Senderos -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow-lg" style="border-radius: 15px;">
                    <i class="fas fa-hiking" style="color: #225b60; font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color: #225b60;">Senderos</h4>
                </div>
            </div>
            <!-- Ciclismo de Montaña -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow-lg" style="border-radius: 15px;">
                    <i class="fas fa-bicycle" style="color: #225b60; font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color: #225b60;">Ciclismo de Montaña</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mapa -->
<div class="map-text-section my-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="font-weight-bold" style="color: #225b60; font-size: 2rem;">Encuéntranos en Totonicapán</h2>
                <p style="font-size: 1.1rem; color: #444;">Estamos ubicados en un hermoso paraje natural en Totonicapán, Guatemala, rodeados de naturaleza y belleza escénica. Ven a disfrutar de nuestras actividades ecológicas y a aprender más sobre la conservación del medio ambiente.</p>
            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9 shadow-lg rounded">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.454514963208!2d-91.45752768518444!3d14.935589990087266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x858dbf498741333d%3A0x4b64784c88df0ba9!2sWMMC%2BPR3%2C%20Totonicap%C3%A1n!5e0!3m2!1ses!2sgt!4v1692648796638!5m2!1ses!2sgt" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
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

    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.3)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.2)';
        });
    });

    const ctaButton = document.querySelector('.cta-section .btn');
    ctaButton.addEventListener('mouseenter', function() {
        this.style.backgroundColor = '#218838';
        this.style.transform = 'scale(1.05)';
        this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.3)';
    });
    ctaButton.addEventListener('mouseleave', function() {
        this.style.backgroundColor = '#28a745';
        this.style.transform = 'scale(1)';
        this.style.boxShadow = '0 8px 15px rgba(0, 0, 0, 0.2)';
    });
</script>
@endsection
