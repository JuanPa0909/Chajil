@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Panel de Mesero</h1>
    <p class="text-center text-muted mb-5">Selecciona una opción para gestionar las operaciones del restaurante.</p>
    <div class="row justify-content-center">
        <!-- Gestión de Mesas -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #ffffff; border-radius: 15px;">
                <div class="card-body text-center">
                    <i class="fas fa-chair fa-3x mb-4" style="color: #004d40;"></i>
                    <h5 class="card-title font-weight-bold">Gestión de Mesas</h5>
                    <p class="card-text">Controla y organiza la disponibilidad de las mesas.</p>
                    <a href="{{ route('mesas.index') }}" class="btn btn-outline-dark mt-3" style="border-radius: 25px;">Ir a Mesas</a>
                </div>
            </div>
        </div>
        <!-- Gestión de Pedidos -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #ffffff; border-radius: 15px;">
                <div class="card-body text-center">
                    <i class="fas fa-concierge-bell fa-3x mb-4" style="color: #004d40;"></i>
                    <h5 class="card-title font-weight-bold">Gestión de Pedidos</h5>
                    <p class="card-text">Administra los pedidos realizados por los clientes.</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-outline-dark mt-3" style="border-radius: 25px;">Ir a Pedidos</a>
                </div>
            </div>
        </div>
        <!-- Gestión de Pagos -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background-color: #ffffff; border-radius: 15px;">
                <div class="card-body text-center">
                    <i class="fas fa-cash-register fa-3x mb-4" style="color: #004d40;"></i>
                    <h5 class="card-title font-weight-bold">Gestión de Pagos</h5>
                    <p class="card-text">Procesa y gestiona los pagos realizados por los clientes.</p>
                    <a href="{{ route('pagos.index') }}" class="btn btn-outline-dark mt-3" style="border-radius: 25px;">Ir a Pagos</a>
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
        color: #004d40; /* Icon color */
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #004d40;
    }

    .card-text {
        font-size: 1rem;
        color: #333333;
    }

    h1 {
        font-size: 2.5rem;
        color: #004d40;
    }
</style>
@endsection
