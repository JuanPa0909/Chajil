@extends('layout')

@section('content')
<!-- Hero Section con Efecto Parallax Mejorado -->
<div class="hero text-center d-flex align-items-center justify-content-center" style="height: 600px; background: url('{{ asset('imagenes/puente.jpg') }}') no-repeat center center fixed; background-size: cover; position: relative;">
    <div class="overlay" style="background-color: rgba(34, 73, 87, 0.85); padding: 50px; border-radius: 15px; box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.4); backdrop-filter: blur(5px);">
        <h1 class="display-4 text-white font-weight-bold animate__animated animate__fadeInDown">Bienvenido a Chajil Siwan</h1>
        <p class="lead text-white animate__animated animate__fadeInUp">Parque Ecológico Comunitario - Aventura entre Bosques</p>
        <a href="#donaciones" class="btn btn-light btn-lg mt-4" style="border-radius: 25px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); transition: all 0.3s ease;">Descubre Más</a>
    </div>
</div>

<div id="donaciones" class="content py-5" style="background-color: #f5f7f6;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('imagenes/panoramica.jpg') }}" class="img-fluid rounded shadow-lg" alt="Donaciones">
            </div>
            <div class="col-md-6">
                <h2 class="font-weight-bold mb-4" style="color: #225b60; font-size: 2.5rem;">Entrada al Parque</h2>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Ingreso por persona</td>
                            <td style="background-color: #f9f9d2;">Q10.00</td>
                        </tr>
                        <tr>
                            <td>Turistas</td>
                            <td style="background-color: #f9f9d2;">Q15.00</td>
                        </tr>
                        <tr>
                            <td>Parqueo</td>
                            <td style="background-color: #f9f9d2;">Gratis</td>
                        </tr>
                        <tr>
                            <td>Guía en senderos</td>
                            <td style="background-color: #f9f9d2;">Incluido</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-muted">- La entrada al Parque incluye visita guiada en senderos y estacionamiento gratuito.</p>
            </div>
        </div>
    </div>
</div>

<h2 class="text-center font-weight-bold mb-4" style="color: #225b60; font-size: 2.5rem;">Galería</h2>

<div class="gallery my-5">
    <div class="container-fluid px-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('imagenes/entrada.jpg') }}" class="d-block w-100" alt="Imagen 1" style="object-fit: cover; height: 550px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenes/sendero.jpg') }}" class="d-block w-100" alt="Imagen 2" style="object-fit: cover; height: 550px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenes/puente.jpg') }}" class="d-block w-100" alt="Imagen 3" style="object-fit: cover; height: 550px;">
                </div>
            </div>
            <a class="carousel-control-prev custom-control" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark p-3 rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next custom-control" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark p-3 rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
</div>

<div class="more-chajil-section py-5" style="background-color: #f5f7f6;">
    <div class="container">
        <h2 class="text-center font-weight-bold mb-5" style="color: #225b60; font-size: 2.5rem;">Más de Chajil Siwan</h2>
        <div class="row text-center">
            <!-- Fauna y Flora -->
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-paw" style="color: #225b60; font-size: 2rem;"></i>
                    <span class="ml-3" style="font-size: 1.2rem; color: #225b60;">Fauna y Flora</span>
                </div>
            </div>
            <!-- Eventos -->
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-calendar-alt" style="color: #225b60; font-size: 2rem;"></i>
                    <span class="ml-3" style="font-size: 1.2rem; color: #225b60;">Eventos</span>
                </div>
            </div>
            <!-- Observación de Aves -->
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-binoculars" style="color: #225b60; font-size: 2rem;"></i>
                    <span class="ml-3" style="font-size: 1.2rem; color: #225b60;">Observación de Aves</span>
                </div>
            </div>
            <!-- Camping -->
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-campground" style="color: #225b60; font-size: 2rem;"></i>
                    <span class="ml-3" style="font-size: 1.2rem; color: #225b60;">Camping</span>
                </div>
            </div>
            <!-- Senderos -->
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-hiking" style="color: #225b60; font-size: 2rem;"></i>
                    <span class="ml-3" style="font-size: 1.2rem; color: #225b60;">Senderos</span>
                </div>
            </div>
            <!-- Ciclismo de Montaña -->
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-bicycle" style="color: #225b60; font-size: 2rem;"></i>
                    <span class="ml-3" style="font-size: 1.2rem; color: #225b60;">Ciclismo de Montaña</span>
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

    // Hover Effect en las Tarjetas
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

    // Efecto en el botón "Reserva Ahora"
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
