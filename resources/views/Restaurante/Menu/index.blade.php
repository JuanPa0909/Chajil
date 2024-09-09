@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Menú del Restaurante</h1>
    <p class="text-center text-muted mb-5">Selecciona los elementos que deseas agregar al pedido y define la cantidad.</p>
    
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8 text-center">
            <button class="btn btn-outline-success mr-2" id="showBreakfast" style="border-radius: 25px;">Desayunos</button>
            <button class="btn btn-outline-success mr-2" id="showLunch" style="border-radius: 25px;">Almuerzos</button>
            <button class="btn btn-outline-success mr-2" id="showSnacks" style="border-radius: 25px;">Refacciones</button>
            <button class="btn btn-outline-success" id="showDrinks" style="border-radius: 25px;">Bebidas</button>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Menú de Desayunos -->
            <div id="breakfastSection" class="card border-0 shadow-lg mb-4 d-none" style="background: #ffffff; border-radius: 15px;">
                <div class="card-body">
                    <h2 class="text-center font-weight-bold mb-4" style="color: #004d40;">Desayunos</h2>
                    <div class="row">
                        @foreach($desayunos as $desayuno)
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <span class="font-weight-bold">{{ $desayuno->nombre }}</span>
                                        <p class="mb-0 text-muted">{{ $desayuno->descripcion }}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-bold mr-3">Q{{ number_format($desayuno->precio, 2) }}</span>
                                        <input type="number" name="cantidad[{{ $desayuno->id_menu }}]" value="0" min="0" class="form-control" style="width: 70px;">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Menú de Almuerzos -->
            <div id="lunchSection" class="card border-0 shadow-lg mb-4 d-none" style="background: #ffffff; border-radius: 15px;">
                <div class="card-body">
                    <h2 class="text-center font-weight-bold mb-4" style="color: #004d40;">Almuerzos</h2>
                    <div class="row">
                        @foreach($almuerzos as $almuerzo)
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <span class="font-weight-bold">{{ $almuerzo->nombre }}</span>
                                        <p class="mb-0 text-muted">{{ $almuerzo->descripcion }}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-bold mr-3">Q{{ number_format($almuerzo->precio, 2) }}</span>
                                        <input type="number" name="cantidad[{{ $almuerzo->id_menu }}]" value="0" min="0" class="form-control" style="width: 70px;">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Menú de Refacciones -->
            <div id="snackSection" class="card border-0 shadow-lg mb-4 d-none" style="background: #ffffff; border-radius: 15px;">
                <div class="card-body">
                    <h2 class="text-center font-weight-bold mb-4" style="color: #004d40;">Refacciones</h2>
                    <div class="row">
                        @foreach($refacciones as $refaccion)
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <span class="font-weight-bold">{{ $refaccion->nombre }}</span>
                                        <p class="mb-0 text-muted">{{ $refaccion->descripcion }}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-bold mr-3">Q{{ number_format($refaccion->precio, 2) }}</span>
                                        <input type="number" name="cantidad[{{ $refaccion->id_menu }}]" value="0" min="0" class="form-control" style="width: 70px;">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Menú de Bebidas -->
            <div id="drinkSection" class="card border-0 shadow-lg mb-4 d-none" style="background: #ffffff; border-radius: 15px;">
                <div class="card-body">
                    <h2 class="text-center font-weight-bold mb-4" style="color: #004d40;">Bebidas</h2>
                    <div class="row">
                        @foreach($bebidas as $bebida)
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <span class="font-weight-bold">{{ $bebida->nombre }}</span>
                                        <p class="mb-0 text-muted">{{ $bebida->descripcion }}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-bold mr-3">Q{{ number_format($bebida->precio, 2) }}</span>
                                        <input type="number" name="cantidad[{{ $bebida->id_bebida }}]" value="0" min="0" class="form-control" style="width: 70px;">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
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

    h1, h2 {
        color: #004d40;
    }

    .list-unstyled li {
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .list-unstyled li:last-child {
        border-bottom: none;
    }

    .list-unstyled span {
        font-size: 1.1rem;
    }

    .form-control {
        border-radius: 15px;
        text-align: center;
    }

    .btn-success {
        background-color: #004d40;
        border-color: #004d40;
    }

    .btn-success:hover {
        background-color: #00352d;
        border-color: #00352d;
    }
</style>

<script>
    document.getElementById('showBreakfast').addEventListener('click', function() {
        document.getElementById('breakfastSection').classList.remove('d-none');
        document.getElementById('lunchSection').classList.add('d-none');
        document.getElementById('snackSection').classList.add('d-none');
        document.getElementById('drinkSection').classList.add('d-none');
    });

    document.getElementById('showLunch').addEventListener('click', function() {
        document.getElementById('breakfastSection').classList.add('d-none');
        document.getElementById('lunchSection').classList.remove('d-none');
        document.getElementById('snackSection').classList.add('d-none');
        document.getElementById('drinkSection').classList.add('d-none');
    });

    document.getElementById('showSnacks').addEventListener('click', function() {
        document.getElementById('breakfastSection').classList.add('d-none');
        document.getElementById('lunchSection').classList.add('d-none');
        document.getElementById('snackSection').classList.remove('d-none');
        document.getElementById('drinkSection').classList.add('d-none');
    });

    document.getElementById('showDrinks').addEventListener('click', function() {
        document.getElementById('breakfastSection').classList.add('d-none');
        document.getElementById('lunchSection').classList.add('d-none');
        document.getElementById('snackSection').classList.add('d-none');
        document.getElementById('drinkSection').classList.remove('d-none');
    });
</script>
@endsection
