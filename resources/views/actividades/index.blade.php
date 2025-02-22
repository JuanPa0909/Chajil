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
        <!-- Tarjeta especial para Canopy -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0 shadow-lg h-100" style="background: #ffffff; border-radius: 15px;">
                <div class="card-body text-center">
                    <i class="fas fa-mountain fa-3x mb-3 text-success"></i>
                    <h5 class="card-title font-weight-bold">Canopy</h5>
                    <select class="form-control mb-3" id="canopySelect" onchange="actualizarFormCanopy(this.value)">
                        <option value="">Seleccione una opción de Canopy</option>
                        @foreach($actividades as $actividad)
                            @if(stripos($actividad->nombre, 'canopy') !== false)
                                <option value="{{ $actividad->id_actividad }}">{{ $actividad->nombre }} - Q{{ $actividad->costo }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div id="canopyForms">
                        @foreach($actividades as $actividad)
                            @if(stripos($actividad->nombre, 'canopy') !== false)
                                <form method="POST" id="form_{{ $actividad->id_actividad }}" style="display: none;" onsubmit="event.preventDefault(); mostrarResumen('{{ $actividad->id_actividad }}', '{{ $actividad->nombre }}', '{{ $actividad->costo }}');" action="{{ route('actividades.pagar', ['id_actividad' => $actividad->id_actividad]) }}">
                                    @csrf
                                    <p class="card-text text-muted">{{ $actividad->descripcion }}</p>
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <button type="button" class="btn btn-light" onclick="decrease('{{ $actividad->id_actividad }}')">-</button>
                                        <input type="text" name="cantidad" id="cantidad_{{ $actividad->id_actividad }}" class="form-control text-center mx-2" style="width: 50px;" value="1" readonly>
                                        <button type="button" class="btn btn-light" onclick="increase('{{ $actividad->id_actividad }}')">+</button>
                                    </div>
                                    <button type="submit" class="btn btn-outline-success mt-2" style="border-radius: 25px;">Cobrar {{ $actividad->nombre }}</button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Resto de actividades (excluyendo Canopy) -->
        @foreach($actividades as $actividad)
            @if(stripos($actividad->nombre, 'canopy') === false)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card border-0 shadow-lg h-100" style="background: #ffffff; border-radius: 15px;">
                        <div class="card-body text-center">
                            @php
                                $icon = 'fa-tree';
                                if (stripos($actividad->nombre, 'entrada') !== false) {
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
            @endif
        @endforeach
    </div>
</div>

<!-- Modal de resumen del pago -->
<div class="modal fade" id="resumenModal" tabindex="-1" role="dialog" aria-labelledby="resumenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="resumenModalLabel">Resumen del Cobro</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="ticketResumen">
                    <div class="ticket-preview" style="border: 2px solid #28a745; padding: 15px; border-radius: 10px;">
                        <div style="text-align: center;">
                            <h3 style="color: #28a745; margin: 10px 0;">Parque Ecológico Chajil Siwan</h3>
                            <div style="border-top: 2px solid #28a745; border-bottom: 2px solid #28a745; padding: 10px 0; margin: 10px 0;">
                                <h5 style="color: #333;">Comprobante de Actividad</h5>
                            </div>
                        </div>
                        <div style="margin: 15px 0;">
                            <p id="resumenActividad" class="font-weight-bold" style="color: #333;"></p>
                            <p id="resumenCantidad" style="color: #666;"></p>
                            <p id="resumenTotal" class="font-weight-bold" style="color: #28a745;"></p>
                            <p id="resumenFecha" style="color: #666;"></p>
                            <p id="resumenFolio" style="color: #666;"></p>
                        </div>
                        <div style="text-align: center; margin-top: 15px;">
                            <p style="color: #28a745;">¡Gracias por su visita!</p>
                            <p style="font-size: 0.9em; color: #666;">Conserve este ticket para su actividad</p>
                            <div style="margin: 10px 0;">
                                <i class="fas fa-leaf" style="color: #28a745; margin: 0 5px;"></i>
                                <i class="fas fa-tree" style="color: #28a745; margin: 0 5px;"></i>
                                <i class="fas fa-mountain" style="color: #28a745; margin: 0 5px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="confirmarCobro">Confirmar y Cobrar</button>
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

    function actualizarFormCanopy(id_actividad) {
        // Ocultar todos los formularios
        document.querySelectorAll('#canopyForms form').forEach(form => {
            form.style.display = 'none';
        });
        
        // Mostrar el formulario seleccionado
        if(id_actividad) {
            document.getElementById('form_' + id_actividad).style.display = 'block';
        }
    }

    function generarFolio() {
        return 'CS-' + Date.now().toString().slice(-6);
    }

    function mostrarResumen(id, nombre, costo) {
        let cantidad = document.getElementById('cantidad_' + id).value;
        let total = calcularTotal(cantidad, costo);
        let fecha = new Date().toLocaleDateString('es-GT');
        let folio = generarFolio();

        document.getElementById('resumenActividad').innerText = 'Actividad: ' + nombre;
        document.getElementById('resumenCantidad').innerText = 'Cantidad de boletos: ' + cantidad;
        document.getElementById('resumenTotal').innerText = 'Total: Q' + total;
        document.getElementById('resumenFecha').innerText = 'Fecha: ' + fecha;
        document.getElementById('resumenFolio').innerText = 'Folio: ' + folio;

        $('#resumenModal').modal('show');

        document.getElementById('confirmarCobro').onclick = function() {
            document.getElementById('form_' + id).submit();
            imprimirTickets(cantidad, nombre, total, fecha);
        };
    }

    function calcularTotal(cantidad, costo) {
        return cantidad * costo;
    }

    function imprimirTickets(cantidad, nombre, total, fecha) {
        // Crear ventana de impresión
        let printWindow = window.open('', '', 'height=600,width=400');
        printWindow.document.write('<html><head><title>Tickets</title>');
        
        // Estilos para los tickets
        printWindow.document.write(`
            <style>
                body { 
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 20px;
                    background-color: #f8f9fa;
                }
                .ticket {
                    background-color: white;
                    border: 2px solid #28a745;
                    border-radius: 10px;
                    padding: 15px;
                    margin-bottom: 20px;
                    page-break-after: always;
                }
                .ticket:last-child {
                    page-break-after: auto;
                }
                .ticket-header {
                    text-align: center;
                    color: #28a745;
                    margin-bottom: 15px;
                }
                .ticket-content {
                    margin: 15px 0;
                    color: #333;
                }
                .ticket-footer {
                    text-align: center;
                    margin-top: 15px;
                    color: #28a745;
                }
                .divider {
                    border-top: 2px solid #28a745;
                    border-bottom: 2px solid #28a745;
                    padding: 10px 0;
                    margin: 10px 0;
                }
                .icons {
                    margin: 10px 0;
                    text-align: center;
                }
                @media print {
                    body { background-color: white; }
                    .ticket { border: 2px solid #28a745; }
                }
            </style>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        `);
        
        printWindow.document.write('</head><body>');
        
        // Generar cada ticket
        for(let i = 1; i <= cantidad; i++) {
            let folio = generarFolio();
            
            printWindow.document.write(`
                <div class="ticket">
                    <div class="ticket-header">
                        <h3>Parque Ecológico Chajil Siwan</h3>
                        <div class="divider">
                            <h5>Comprobante de Actividad</h5>
                        </div>
                    </div>
                    <div class="ticket-content">
                        <p><strong>Actividad:</strong> ${nombre}</p>
                        <p><strong>Fecha:</strong> ${fecha}</p>
                        <p><strong>Folio:</strong> ${folio}</p>
                        <p><strong>Ticket:</strong> ${i} de ${cantidad}</p>
                    </div>
                    <div class="ticket-footer">
                        <p>¡Gracias por su visita!</p>
                        <p style="font-size: 0.9em;">Conserve este ticket para su actividad</p>
                        <div class="icons">
                            <i class="fas fa-leaf" style="margin: 0 5px;"></i>
                            <i class="fas fa-tree" style="margin: 0 5px;"></i>
                            <i class="fas fa-mountain" style="margin: 0 5px;"></i>
                        </div>
                    </div>
                </div>
            `);
        }
        
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        // Esperar a que cargue el contenido antes de imprimir
        setTimeout(function() {
            printWindow.focus();
            printWindow.print();
        }, 500);
    }
</script>
@endsection