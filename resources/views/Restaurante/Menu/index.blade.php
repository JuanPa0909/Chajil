@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Gestión de Pedidos</h1>
    <p class="text-center text-muted mb-5">Selecciona los menús y bebidas para procesar el pedido.</p>

    <!-- Formulario para el pedido -->
    <form action="{{ route('pedido.store') }}" method="POST">
        @csrf

        <!-- Datos del Pedido -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg mb-4" style="border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold" style="color: #004d40;">Datos del Pedido</h4>
                        <div class="form-group">
                            <label for="mesa" class="font-weight-bold">Número de Mesa</label>
                            <input type="text" id="mesa" name="mesa" class="form-control" placeholder="Ingrese el número de mesa" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menús disponibles organizados por categorías -->
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-lg mb-4" style="border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold" style="color: #004d40;">Menús Disponibles</h4>

                        <!-- Desayunos -->
                        <div class="form-group">
                            <label class="font-weight-bold">Desayunos</label>
                            <select class="form-control" id="desayuno" name="desayuno[]">
                                <option selected disabled>Selecciona un desayuno</option>
                                @foreach($desayunos as $desayuno)
                                <option value="{{ $desayuno->id_menu }}">
                                    {{ $desayuno->nombre }} - Q{{ $desayuno->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" name="cantidad_desayuno" class="form-control mt-2" placeholder="Cantidad" min="1">
                        </div>

                        <!-- Almuerzos -->
                        <div class="form-group">
                            <label class="font-weight-bold">Almuerzos</label>
                            <select class="form-control" id="almuerzo" name="almuerzo[]">
                                <option selected disabled>Selecciona un almuerzo</option>
                                @foreach($almuerzos as $almuerzo)
                                <option value="{{ $almuerzo->id_menu }}">
                                    {{ $almuerzo->nombre }} - Q{{ $almuerzo->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" name="cantidad_almuerzo" class="form-control mt-2" placeholder="Cantidad" min="1">
                        </div>

                        <!-- Refacciones -->
                        <div class="form-group">
                            <label class="font-weight-bold">Refacciones</label>
                            <select class="form-control" id="refaccion" name="refaccion[]">
                                <option selected disabled>Selecciona una refacción</option>
                                @foreach($refacciones as $refaccion)
                                <option value="{{ $refaccion->id_menu }}">
                                    {{ $refaccion->nombre }} - Q{{ $refaccion->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" name="cantidad_refaccion" class="form-control mt-2" placeholder="Cantidad" min="1">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bebidas disponibles organizadas por categorías -->
            <div class="col-md-6">
                <div class="card shadow-lg mb-4" style="border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold" style="color: #004d40;">Bebidas Disponibles</h4>

                        <!-- Bebidas Calientes -->
                        <div class="form-group">
                            <label class="font-weight-bold">Bebidas Calientes</label>
                            <select class="form-control" id="bebida_caliente" name="bebida_caliente[]">
                                <option selected disabled>Selecciona una bebida caliente</option>
                                @foreach($bebidas->where('tipo', 'caliente') as $bebida)
                                <option value="{{ $bebida->id_bebida }}">
                                    {{ $bebida->nombre }} - Q{{ $bebida->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" name="cantidad_bebida_caliente" class="form-control mt-2" placeholder="Cantidad" min="1">
                        </div>

                        <!-- Bebidas Frías -->
                        <div class="form-group">
                            <label class="font-weight-bold">Bebidas Frías</label>
                            <select class="form-control" id="bebida_fria" name="bebida_fria[]">
                                <option selected disabled>Selecciona una bebida fría</option>
                                @foreach($bebidas->where('tipo', 'fria') as $bebida)
                                <option value="{{ $bebida->id_bebida }}">
                                    {{ $bebida->nombre }} - Q{{ $bebida->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" name="cantidad_bebida_fria" class="form-control mt-2" placeholder="Cantidad" min="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de Procesar Pedido -->
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 25px;">Procesar Pedido</button>
            </div>
        </div>
    </form>
</div>

<style>
    body {
        background: #f8f9fa; 
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .form-group label {
        color: #004d40;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #1976d2;
        border: none;
    }

    .btn-primary:hover {
        background-color: #1565c0;
    }

    h5, h4 {
        color: #004d40;
        font-weight: bold;
    }
</style>
@endsection
