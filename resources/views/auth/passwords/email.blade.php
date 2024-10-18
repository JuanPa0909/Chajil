@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f0f0f0;">
    <div class="card shadow-lg p-5" style="max-width: 450px; width: 100%; border-radius: 20px; background-color: #ffffff;">
        <div class="text-center mb-4">
            <h3 class="font-weight-bold" style="color: #004d40;">Recuperar Contraseña</h3>
            <p style="color: #666;">Ingresa tu correo para recibir un enlace de recuperación de contraseña.</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success text-center" style="color: green;">
                {{ session('status') }}
            </div>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="font-weight-bold" style="color: #004d40;">Correo Electrónico</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light" style="border-right: 0;"><i class="fas fa-envelope" style="color: #004d40;"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Introduce tu correo electrónico" required style="background-color: #e9f5f0; border-left: 0; padding-left: 10px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-custom btn-block mt-4">Enviar enlace de recuperación</button>
            </form>
        </div>
    </div>
</div>

<style>
    /* Botón personalizado */
    .btn-custom {
        background-color: #004d40;
        border: none;
        color: white;
        font-weight: bold;
        padding: 12px;
        border-radius: 25px;
        font-size: 16px;
    }
    .btn-custom:hover {
        background-color: #003d33;
    }

    /* Estilos del grupo de input */
    .input-group-text {
        color: #004d40;
        border-color: #e9f5f0;
    }

    /* Tarjeta contenedora */
    .card {
        border: none;
    }
</style>
@endsection
