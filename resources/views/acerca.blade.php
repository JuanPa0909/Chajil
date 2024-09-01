@extends('layout')

@section('content')
<div class="container py-5" style="background-color: #ffffff; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Acerca de Nosotros</h1>
    <p class="text-center text-muted mb-5">Conoce más sobre nuestra misión, visión y valores.</p>

    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #004d40; color: white; border-radius: 15px;">
                <div class="card-body">
                    <i class="fas fa-leaf fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Nuestra Misión</h5>
                    <p class="card-text">Ofrecer un lugar natural para recreación, aventura y 
                        servicio de alimentación de calidad a los visitantes, además de fomentar la protección y 
                        cuidado del medio ambiente y ser una alternativa para la mejora económica de la comunidad 
                        Chuamazan.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #004d40; color: white; border-radius: 15px;">
                <div class="card-body">
                    <i class="fas fa-eye fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Nuestra Visión</h5>
                    <p class="card-text">Como se ve el Parque Ecológico Comunitario Chajil Siwan en 5 años:
                        En el 2017 nuestro Parque Ecológico Comunitario Chajil Siwan es una opción única, 
                        interesante y agradable para la recreación del visitante gracias al servicio, 
                        administración e infraestructura que ofrece; y es una alternativa económica de 
                        ingreso para la Comunidad Chuamazan, que conserva y protege los recursos naturales.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #004d40; color: white; border-radius: 15px;">
                <div class="card-body">
                    <i class="fas fa-hands-helping fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Nuestros Valores</h5>
                    <p class="card-text">Compromiso, Respeto, Sustentabilidad y Educación para proteger nuestro entorno natural.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold" style="color: #004d40;">Nuestra Historia</h3>
                    <p class="card-text">El Parque Ecológico dsfdfsdfkaskm</p>
                    <p class="card-text">Parte de la historia............</p>
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
</style>
@endsection
