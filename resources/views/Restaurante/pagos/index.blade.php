@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Gestión de Pagos</h1>
    <p class="text-center text-muted mb-5">Selecciona un pedido para registrar el pago.</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Mostrar los pedidos -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Número de Pedido</th>
                <th>Mesa</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id_pedido }}</td>
                <td>{{ $pedido->id_mesa }}</td>
                <td>Q{{ number_format($pedido->total, 2) }}</td>
                <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <!-- Botón para abrir el modal -->
                    <button class="btn btn-outline-dark registrar-pago" 
                            data-id="{{ $pedido->id_pedido }}" 
                            data-total="{{ $pedido->total }}">
                        Registrar Pago
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal para Registrar el Pago -->
    <div class="modal fade" id="pagoModal" tabindex="-1" role="dialog" aria-labelledby="pagoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pagoModalLabel">Registrar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-pago" action="{{ route('pagos.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Campo oculto para el id del pedido -->
                        <input type="hidden" name="id_pedido" id="modal-id-pedido">

                        <div class="form-group">
                            <label for="monto">Monto a Pagar</label>
                            <input type="number" step="0.01" class="form-control" id="modal-monto" name="monto" required>
                        </div>

                        <div class="form-group">
                            <label for="metodo_pago">Método de Pago</label>
                            <select class="form-control" name="metodo_pago" id="metodo_pago" required>
                                <option value="" disabled selected>Selecciona un método de pago</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar Pago</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery y Bootstrap (asegúrate de tener solo una versión de cada uno) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script para manejar el modal y el formulario -->
<script>
    $(document).ready(function () {
        // Escuchar el evento del botón que abre el modal
        $('.registrar-pago').on('click', function () {
            var idPedido = $(this).data('id'); // Extraer el id del pedido del atributo data-id
            var total = $(this).data('total'); // Extraer el total del pedido del atributo data-total

            // Pasar los valores al modal
            $('#modal-id-pedido').val(idPedido);  // Asignar el id_pedido al campo oculto
            $('#modal-monto').val(total);         // Asignar el monto al campo de monto

            // Mostrar el modal
            $('#pagoModal').modal('show');
        });

        // Validar el formulario antes de enviarlo
        $('#form-pago').on('submit', function(event) {
            if ($('#modal-id-pedido').val() === '') {
                alert('El ID del pedido no ha sido asignado correctamente.');
                event.preventDefault(); // Evitar el envío del formulario si el id_pedido no está presente
            }
        });

        // Forzar el cierre del modal manualmente si el botón no funciona
        $('.close').on('click', function () {
            $('#pagoModal').modal('hide');
        });
    });
</script>
@endsection
