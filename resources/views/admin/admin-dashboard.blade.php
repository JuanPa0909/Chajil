@extends('layout')

@section('content')
<div class="container-fluid py-5" style="background-color: #ffffff;">
    <h1 class="text-center font-weight-bold mb-4" style="color: #004d40;">Panel de Control del Administrador</h1>
    <p class="text-center text-muted mb-5">
        Bienvenido, {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}
    </p>

    <div class="row g-4">
        <!-- Gestión de Restaurante -->
        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <div class="card h-100 text-center border-0 shadow tarjeta-responsive">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="fas fa-utensils fa-3x mb-3"></i>
                    <h5 class="card-title font-weight-bold">Restaurante</h5>
                    <p class="card-text">Gestiona las operaciones del restaurante.</p>
                    <a href="{{ route('restaurante.index') }}" class="btn btn-outline-primary mt-auto btn-custom">Ir a Restaurante</a>
                </div>
            </div>
        </div>

        <!-- Gestión del Menú -->
        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <div class="card h-100 text-center border-0 shadow tarjeta-responsive">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="fas fa-list-alt fa-3x mb-3"></i>
                    <h5 class="card-title font-weight-bold">Gestión del Menú</h5>
                    <p class="card-text">Administra los elementos del menú.</p>
                    <a href="{{ route('admin.gestion-menu') }}" class="btn btn-outline-primary mt-auto btn-custom">Ir a Gestión del Menú</a>
                </div>
            </div>
        </div>

        <!-- Gestión de Inventario -->
        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <div class="card h-100 text-center border-0 shadow tarjeta-responsive">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="fas fa-boxes fa-3x mb-3"></i>
                    <h5 class="card-title font-weight-bold">Inventario</h5>
                    <p class="card-text">Administra el inventario del restaurante y parque.</p>
                    <a href="#" class="btn btn-outline-primary mt-auto btn-custom">Ir a Inventario</a>
                </div>
            </div>
        </div>

        <!-- Gestión de Actividades -->
        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <div class="card h-100 text-center border-0 shadow tarjeta-responsive">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="fas fa-calendar-alt fa-3x mb-3"></i>
                    <h5 class="card-title font-weight-bold">Gestión de Actividades</h5>
                    <p class="card-text">Administra las actividades del parque.</p>
                    <a href="{{ route('admin.gestion-actividades') }}" class="btn btn-outline-primary mt-auto btn-custom">Ir a Gestión de Actividades</a>
                </div>
            </div>
        </div>

        <!-- Cobro de Actividades -->
        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <div class="card h-100 text-center border-0 shadow tarjeta-responsive">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="fas fa-money-bill-wave fa-3x mb-3"></i>
                    <h5 class="card-title font-weight-bold">Cobro de Actividades</h5>
                    <p class="card-text">Gestiona los cobros de actividades del parque.</p>
                    <a href="{{ route('actividades.index') }}" class="btn btn-outline-primary mt-auto btn-custom">Ir a Cobro de Actividades</a>
                </div>
            </div>
        </div>

        <!-- Reportes -->
        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <div class="card h-100 text-center border-0 shadow tarjeta-responsive">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="fas fa-chart-line fa-3x mb-3"></i>
                    <h5 class="card-title font-weight-bold">Reportes</h5>
                    <p class="card-text">Genera y revisa reportes de operaciones.</p>
                    <a href="{{ route('admin.reportes') }}" class="btn btn-outline-primary mt-auto btn-custom">Ir a Reportes</a>
                </div>
            </div>
        </div>

        <!-- Gestión de Usuarios -->
        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <div class="card h-100 text-center border-0 shadow tarjeta-responsive">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h5 class="card-title font-weight-bold">Gestión de Usuarios</h5>
                    <p class="card-text">Administra los usuarios del sistema.</p>
                    <a href="{{ route('admin.gestion-usuarios') }}" class="btn btn-outline-primary mt-auto btn-custom">Ir a Gestión de Usuarios</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .tarjeta-responsive {
        max-width: 330px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-custom {
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 0.9rem;
    }

    h1 {
        font-size: 2.5rem;
        color: #004d40;
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .card-text {
        font-size: 1rem;
        color: #6c757d;
    }

    i {
        color: #004d40;
    }
</style>
@endsection
