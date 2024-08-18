@extends('layout')

@section('content')
<div class="container d-flex justify-content-between align-items-center" style="min-height: 80vh;">
    <!-- Sección Izquierda -->
    <div class="left-section text-center" style="max-width: 45%;">
        <h1 class="display-4 font-weight-bold" style="color: #004d40;">CHAJIL SIWAN</h1>
        <p class="lead" style="color: #004d40;">Administración y Gestión del Parque Ecológico</p>
    </div>

    <!-- Sección de Login -->
    <div class="card p-5 shadow-lg" style="background-color: rgba(13, 61, 46, 0.05); border-radius: 15px; max-width: 400px; width: 100%;">
        <div class="text-center mb-4">
            <h2 class="font-weight-bold" style="color: #004d40;">Iniciar Sesión</h2>
        </div>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="text-dark font-weight-bold">Correo Electrónico</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Introduce tu correo electrónico" style="background-color: #e9f5f0;">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="text-dark font-weight-bold">Contraseña</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Introduce tu contraseña" style="background-color: #e9f5f0;">
                </div>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Iniciar Sesión</button>
        </form>
    </div>
</div>

<style>
    .btn-custom {
        background-color: #004d40;
        border: none;
        color: white;
        font-weight: bold;
    }
    .btn-custom:hover {
        background-color: #003d33;
    }
    .input-group-text {
        color: #004d40;
    }
    .card {
        border: none;
    }
</style>
@endsection

