@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Panel de Control</h1>
    <p class="text-center text-muted mb-5">Selecciona una opción para gestionar las operaciones del parque.</p>
    <div class="row justify-content-center">
        
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-utensils fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Restaurante</h5>
                    <p class="card-text">Gestiona las operaciones del restaurante.</p>
                    <a href="{{ route('restaurante.index') }}" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Ir a Restaurante</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-money-bill-wave fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Cobro de Actividades</h5>
                    <p class="card-text">Gestiona los cobros de actividades del parque</p>
                    <a href="{{ route('actividades.index') }}" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Ir a Cobro de Actividades</a>
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

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-body i {
        color: #b2dfdb;
    }

    .card-title {
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .card-text {
        font-size: 1rem;
    }

    h1 {
        font-size: 2.5rem;
        color: #004d40;
    }
</style>
@endsection
