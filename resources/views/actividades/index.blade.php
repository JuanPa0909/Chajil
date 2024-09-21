@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Cobro de Actividades</h1>
    <p class="text-center text-muted mb-5">Selecciona una actividad para gestionar el cobro.</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        @foreach($actividades as $actividad)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card border-0 shadow-lg h-100" style="background: #ffffff; border-radius: 15px;">
                    <div class="card-body text-center">
                        @php
                            $icon = 'fa-tree'; // Icono por defecto
                            if (stripos($actividad->nombre, 'canopy') !== false) {
                                $icon = 'fa-mountain';
                            } elseif (stripos($actividad->nombre, 'entrada') !== false) {
                                $icon = 'fa-ticket-alt';
                            } elseif (stripos($actividad->nombre, 'bicicleta') !== false || stripos($actividad->nombre, 'ciclismo') !== false) {
                                $icon = 'fa-bicycle';
                            }
                        @endphp
                        <i class="fas {{ $icon }} fa-3x mb-3 text-success"></i>
                        <h5 class="card-title font-weight-bold">{{ $actividad->nombre }}</h5>
                        <p class="card-text text-muted">{{ $actividad->descripcion }}</p>
                        <form method="POST" action="{{ route('actividades.pagar', ['id_actividad' => $actividad->id_actividad]) }}">
                            @csrf
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <button type="button" class="btn btn-light" onclick="decrease('{{ $actividad->id_actividad }}')">-</button>
                                <input type="text" name="cantidad" id="cantidad_{{ $actividad->id_actividad }}" class="form-control text-center mx-2" style="width: 50px;" value="1" readonly>
                                <button type="button" class="btn btn-light" onclick="increase('{{ $actividad->id_actividad }}')">+</button>
                            </div>
                            <button type="submit" class="btn btn-outline-success mt-2" style="border-radius: 25px;">Cobrar {{ $actividad->nombre }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function increase(id) {
        let input = document.getElementById('cantidad_' + id);
        input.value = parseInt(input.value) + 1;
    }

    function decrease(id) {
        let input = document.getElementById('cantidad_' + id);
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
@endsection
