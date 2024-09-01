@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Panel de Mesero</h1>
    <p class="text-center text-muted mb-5">Selecciona una opción para gestionar las operaciones del restaurante.</p>
    <div class="row justify-content-center">
        <!-- Gestión de Mesas -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-chair fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Gestión de Mesas</h5>
                    <p class="card-text">Controla y organiza la disponibilidad de las mesas.</p>
                    <a href="#" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Ir a Mesas</a>
                </div>
            </div>
        </div>
        <!-- Gestión de Pedidos -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-concierge-bell fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Gestión de Pedidos</h5>
                    <p class="card-text">Administra los pedidos realizados por los clientes.</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Ir a Pedidos</a>
                </div>
            </div>
        </div>
        <!-- Gestión de Pagos -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-cash-register fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Gestión de Pagos</h5>
                    <p class="card-text">Procesa y gestiona los pagos realizados por los clientes.</p>
                    <a href="#" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Ir a Pagos</a>
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
        font-size: 1.5rem;
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
