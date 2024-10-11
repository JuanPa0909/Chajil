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
                            $icon = 'fa-tree';
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
                        <form method="POST" id="form_{{ $actividad->id_actividad }}" onsubmit="event.preventDefault(); mostrarResumen('{{ $actividad->id_actividad }}', '{{ $actividad->nombre }}', '{{ $actividad->costo }}');" action="{{ route('actividades.pagar', ['id_actividad' => $actividad->id_actividad]) }}">
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

<!-- Modal de resumen del pago -->
<div class="modal fade" id="resumenModal" tabindex="-1" role="dialog" aria-labelledby="resumenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resumenModalLabel">Resumen del Cobro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="ticketResumen">
                    <h3 class="text-center">Parque Ecológico Chajil Siwan</h3>
                    <h5 class="text-center">Resumen de Actividad</h5>
                    <hr>
                    <p id="resumenActividad" class="font-weight-bold"></p>
                    <p id="resumenCantidad"></p>
                    <p id="resumenTotal"></p>
                    <hr>
                    <p class="text-center">¡Gracias por su visita!</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmarCobro">Confirmar y Cobrar</button>
            </div>
        </div>
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

    function mostrarResumen(id, nombre, costo) {
        let cantidad = document.getElementById('cantidad_' + id).value;
        let total = calcularTotal(cantidad, costo);

        document.getElementById('resumenActividad').innerText = 'Actividad: ' + nombre;
        document.getElementById('resumenCantidad').innerText = 'Cantidad de boletos: ' + cantidad;
        document.getElementById('resumenTotal').innerText = 'Total: Q' + total;

        $('#resumenModal').modal('show');

        document.getElementById('confirmarCobro').onclick = function() {
            document.getElementById('form_' + id).submit();
            imprimirResumen();  // Imprime automáticamente al confirmar y cobrar
        };
    }

    function calcularTotal(cantidad, costo) {
        return cantidad * costo;
    }

    function imprimirResumen() {
        let ticketContent = document.getElementById('ticketResumen').innerHTML;
        let printWindow = window.open('', '', 'height=600,width=400');
        printWindow.document.write('<html><head><title>Ticket</title>');
        printWindow.document.write('<style>body { font-family: Arial, sans-serif; text-align: center; }');
        printWindow.document.write('h3, h5 { margin: 10px 0; } p { margin: 5px 0; } hr { border-top: 1px solid #000; }');
        printWindow.document.write('</style></head><body>');
        printWindow.document.write(ticketContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
    }
</script>
@endsection
