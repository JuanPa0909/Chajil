@extends('layout')

@section('content')
<div class="container-fluid py-5" style="background-color: #ffffff;">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Panel de Control</h1>
    <p class="text-center text-muted mb-5">Selecciona una opción para gestionar las operaciones del parque.</p>
    <div class="row justify-content-center">
        
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: #ffffff; border-radius: 15px;">
                <div class="card-body text-center">
                    <i class="fas fa-utensils fa-3x mb-4" style="color: #004d40;"></i>
                    <h5 class="card-title font-weight-bold" style="color: #004d40;">Restaurante</h5>
                    <p class="card-text text-muted">Gestiona las operaciones del restaurante.</p>
                    <a href="{{ route('restaurante.index') }}" class="btn btn-outline-success mt-3" style="border-radius: 25px;">Ir a Restaurante</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: #ffffff; border-radius: 15px;">
                <div class="card-body text-center">
                    <i class="fas fa-money-bill-wave fa-3x mb-4" style="color: #004d40;"></i>
                    <h5 class="card-title font-weight-bold" style="color: #004d40;">Cobro de Actividades</h5>
                    <p class="card-text text-muted">Gestiona los cobros de actividades del parque</p>
                    <a href="{{ route('actividades.index') }}" class="btn btn-outline-success mt-3" style="border-radius: 25px;">Ir a Cobro de Actividades</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-body i {
        color: #004d40;
    }

    .card-title {
        font-size: 1.8rem;
        margin-bottom: 1rem;
        color: #004d40;
    }

    .card-text {
        font-size: 1rem;
        color: #757575;
    }

    h1 {
        font-size: 2.5rem;
        color: #004d40;
    }

    .btn-outline-success {
        border-radius: 25px;
        border-color: #004d40;
        color: #004d40;
    }

    .btn-outline-success:hover {
        background-color: #004d40;
        color: #ffffff;
    }
</style>
@endsection
