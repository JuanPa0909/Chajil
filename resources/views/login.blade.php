@extends('layout')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 85vh;">
    <div class="card p-4 shadow-lg" style="background-color: rgba(13, 61, 46, 0.9); border-radius: 15px; width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <img src="{{ asset('imagenes/usuario.jpg') }}" class="rounded-circle" alt="User Image" style="width: 100px; height: 100px;">
        </div>
        <h2 class="text-center text-light mb-4">Iniciar Sesión</h2>
        <p class="text-center text-light mb-4">Accede a tu cuenta para gestionar tus reservas y actividades.</p>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="text-light">Correo Electrónico</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Introduce tu correo electrónico">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="text-light">Contraseña</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Introduce tu contraseña">
                </div>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Iniciar Sesión</button>
        </form>
    </div>
</div>

<style>
    .btn-custom {
        background-color: #388e3c;
        border: none;
        color: white;
    }
    .btn-custom:hover {
        background-color: #2e7d32;
    }
    .input-group-text {
        background-color: #66bb6a;
        color: white;
    }
    .input-group-text i {
        font-size: 1.2em;
    }
    .card {
        border: none;
    }
</style>
@endsection
