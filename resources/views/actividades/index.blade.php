@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Cobro de Actividades</h1>
    <p class="text-center text-muted mb-5">Selecciona una actividad para gestionar el cobro.</p>
    <div class="row justify-content-center">
        <!-- Entrada al Parque -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-tree fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Entrada al Parque</h5>
                    <!-- Contador de Tickets -->
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <button class="btn btn-light" onclick="decrease('entrada')">-</button>
                        <input type="text" id="entrada" class="form-control text-center mx-2" style="width: 50px;" value="1" readonly>
                        <button class="btn btn-light" onclick="increase('entrada')">+</button>
                    </div>
                    <a href="#" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Cobrar Entrada</a>
                </div>
            </div>
        </div>
        <!-- Canopy -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-cloud fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Canopy</h5>
                    <!-- Contador de Tickets -->
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <button class="btn btn-light" onclick="decrease('canopy')">-</button>
                        <input type="text" id="canopy" class="form-control text-center mx-2" style="width: 50px;" value="1" readonly>
                        <button class="btn btn-light" onclick="increase('canopy')">+</button>
                    </div>
                    <a href="#" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Cobrar Canopy</a>
                </div>
            </div>
        </div>
        <!-- Ciclismo de Montaña -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-bicycle fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Ciclismo de Montaña</h5>
                    <!-- Contador de Tickets -->
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <button class="btn btn-light" onclick="decrease('ciclismo')">-</button>
                        <input type="text" id="ciclismo" class="form-control text-center mx-2" style="width: 50px;" value="1" readonly>
                        <button class="btn btn-light" onclick="increase('ciclismo')">+</button>
                    </div>
                    <a href="#" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Cobrar Ciclismo</a>
                </div>
            </div>
        </div>
        <!-- Alquiler de Bicicletas -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: linear-gradient(135deg, #004d40, #00695c); border-radius: 15px;">
                <div class="card-body text-center text-white">
                    <i class="fas fa-biking fa-3x mb-4"></i>
                    <h5 class="card-title font-weight-bold">Alquiler de Bicicletas</h5>
                    <!-- Contador de Tickets -->
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <button class="btn btn-light" onclick="decrease('bicicletas')">-</button>
                        <input type="text" id="bicicletas" class="form-control text-center mx-2" style="width: 50px;" value="1" readonly>
                        <button class="btn btn-light" onclick="increase('bicicletas')">+</button>
                    </div>
                    <a href="#" class="btn btn-outline-light mt-3" style="border-radius: 25px;">Cobrar Alquiler</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function increase(id) {
        let input = document.getElementById(id);
        input.value = parseInt(input.value) + 1;
    }

    function decrease(id) {
        let input = document.getElementById(id);
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>

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
    }

    h1 {
        font-size: 2.5rem;
        color: #004d40;
    }
</style>
@endsection
