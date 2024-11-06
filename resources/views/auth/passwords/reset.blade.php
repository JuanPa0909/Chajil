@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f0f0f0;">
    <div class="card shadow-lg p-5" style="max-width: 450px; width: 100%; border-radius: 15px; background-color: #ffffff;">
        <div class="text-center mb-4">
            <h3 class="font-weight-bold" style="color: #004d40;">Restablecer Contraseña</h3>
            <p style="color: #666;">Por favor, introduce tu correo electrónico y una nueva contraseña.</p>
        </div>
        <form id="resetForm" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="font-weight-bold" style="color: #004d40;">Correo Electrónico</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light" style="border-right: 0;"><i class="fas fa-envelope" style="color: #004d40;"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="Introduce tu correo electrónico" required style="background-color: #e9f5f0; border-left: 0; padding-left: 10px;">
                </div>
            </div>

            <div class="form-group mt-4">
                <label for="password" class="font-weight-bold" style="color: #004d40;">Nueva Contraseña</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light" style="border-right: 0;"><i class="fas fa-lock" style="color: #004d40;"></i></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Introduce tu nueva contraseña" required style="background-color: #e9f5f0; border-left: 0; padding-left: 10px;">
                </div>
            </div>

            <div class="form-group mt-4">
                <label for="password_confirmation" class="font-weight-bold" style="color: #004d40;">Confirmar Nueva Contraseña</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light" style="border-right: 0;"><i class="fas fa-lock" style="color: #004d40;"></i></span>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirma tu nueva contraseña" required style="background-color: #e9f5f0; border-left: 0; padding-left: 10px;">
                </div>
                <small id="passwordMatchMessage" class="form-text text-danger" style="display: none;">Las contraseñas no coinciden.</small>
            </div>

            <button type="submit" class="btn btn-custom btn-block mt-4">Restablecer Contraseña</button>
        </form>
    </div>
</div>

<!-- Modal de Éxito -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #004d40; color: white;">
                <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¡La contraseña se ha restablecido con éxito!</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-success">Ir al Login</a>
            </div>
        </div>
    </div>
</div>

<style>
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
    .input-group-text {
        color: #004d40;
        border-color: #e9f5f0;
    }
    .input-group-text .fas {
        color: #004d40;
    }
    .card {
        border: none;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#password, #password_confirmation').on('keyup', function() {
            const password = $('#password').val();
            const confirmPassword = $('#password_confirmation').val();
            if (password !== confirmPassword) {
                $('#passwordMatchMessage').show();
            } else {
                $('#passwordMatchMessage').hide();
            }
        });

        // Mostrar el modal de éxito si la contraseña se actualizó con éxito
        @if(session('status'))
            $('#successModal').modal('show');
        @endif
    });
</script>
@endsection
