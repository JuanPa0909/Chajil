@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Gestión de Pedidos</h1>
    <p class="text-center text-muted mb-5">Selecciona los menús y bebidas para procesar el pedido.</p>

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

    <!-- Formulario para el pedido -->
    <form id="pedido-form" action="{{ route('pedido.store') }}" method="POST">
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
                            <select class="form-control" id="desayuno-select">
                                <option selected disabled>Selecciona un desayuno</option>
                                @foreach($desayunos as $desayuno)
                                <option value="{{ $desayuno->id_menu }}">
                                    {{ $desayuno->nombre }} - Q{{ $desayuno->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" id="cantidad-desayuno" class="form-control mt-2" placeholder="Cantidad" min="1">
                            <button type="button" class="btn btn-primary mt-2" onclick="agregarProducto('desayuno')">Agregar Desayuno</button>
                        </div>

                        <!-- Almuerzos -->
                        <div class="form-group">
                            <label class="font-weight-bold">Almuerzos</label>
                            <select class="form-control" id="almuerzo-select">
                                <option selected disabled>Selecciona un almuerzo</option>
                                @foreach($almuerzos as $almuerzo)
                                <option value="{{ $almuerzo->id_menu }}">
                                    {{ $almuerzo->nombre }} - Q{{ $almuerzo->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" id="cantidad-almuerzo" class="form-control mt-2" placeholder="Cantidad" min="1">
                            <button type="button" class="btn btn-primary mt-2" onclick="agregarProducto('almuerzo')">Agregar Almuerzo</button>
                        </div>

                        <!-- Refacciones -->
                        <div class="form-group">
                            <label class="font-weight-bold">Refacciones</label>
                            <select class="form-control" id="refaccion-select">
                                <option selected disabled>Selecciona una refacción</option>
                                @foreach($refacciones as $refaccion)
                                <option value="{{ $refaccion->id_menu }}">
                                    {{ $refaccion->nombre }} - Q{{ $refaccion->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" id="cantidad-refaccion" class="form-control mt-2" placeholder="Cantidad" min="1">
                            <button type="button" class="btn btn-primary mt-2" onclick="agregarProducto('refaccion')">Agregar Refacción</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bebidas disponibles -->
            <div class="col-md-6">
                <div class="card shadow-lg mb-4" style="border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold" style="color: #004d40;">Bebidas Disponibles</h4>

                        <div class="form-group">
                            <label class="font-weight-bold">Selecciona una bebida</label>
                            <select class="form-control" id="bebida-select">
                                <option selected disabled>Selecciona una bebida</option>
                                @foreach($bebidas as $bebida)
                                <option value="{{ $bebida->id_bebida }}">
                                    {{ $bebida->nombre }} - Q{{ $bebida->precio }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" id="cantidad-bebida" class="form-control mt-2" placeholder="Cantidad" min="1">
                            <button type="button" class="btn btn-primary mt-2" onclick="agregarProducto('bebida')">Agregar Bebida</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de productos agregados -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg mb-4" style="border-radius: 15px;">
                    <div class="card-body">
                        <h4 class="font-weight-bold" style="color: #004d40;">Productos Agregados</h4>
                        <ul id="lista-productos" class="list-group">
                            <!-- Aquí se irán agregando los productos seleccionados -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de procesar pedido -->
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 25px;">Procesar Pedido</button>
            </div>
        </div>
    </form>

    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header" style="background-color: #004d40; color: white;">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea procesar este pedido?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="confirmarPedidoBtn" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Script para agregar y eliminar productos dinámicamente -->
<script>
    let productosMenu = [];
    let productosBebida = [];

    function agregarProducto(tipo) {
        let productoSelect, cantidadInput;

        if (tipo === 'desayuno') {
            productoSelect = document.getElementById('desayuno-select');
            cantidadInput = document.getElementById('cantidad-desayuno');
        } else if (tipo === 'almuerzo') {
            productoSelect = document.getElementById('almuerzo-select');
            cantidadInput = document.getElementById('cantidad-almuerzo');
        } else if (tipo === 'refaccion') {
            productoSelect = document.getElementById('refaccion-select');
            cantidadInput = document.getElementById('cantidad-refaccion');
        } else if (tipo === 'bebida') {
            productoSelect = document.getElementById('bebida-select');
            cantidadInput = document.getElementById('cantidad-bebida');
        }

        let productoId = productoSelect.value;
        let productoNombre = productoSelect.options[productoSelect.selectedIndex].text;
        let cantidad = cantidadInput.value;

        if (cantidad > 0 && productoId) {
            let inputProducto = `<input type="hidden" name="productos_${tipo}[]" value="${productoId}"><input type="hidden" name="cantidades_${tipo}[]" value="${cantidad}">`;
            document.getElementById('pedido-form').insertAdjacentHTML('beforeend', inputProducto);

            // Agregar a la lista visual con la opción de eliminar
            let lista = document.getElementById('lista-productos');
            let li = document.createElement('li');
            li.classList.add('list-group-item');
            li.innerHTML = `${productoNombre} - Cantidad: ${cantidad} <button type="button" class="btn btn-danger btn-sm float-right" onclick="eliminarProducto(this, '${tipo}', '${productoId}', '${cantidad}')">Eliminar</button>`;
            lista.appendChild(li);

            // Resetear selectores
            productoSelect.selectedIndex = 0;
            cantidadInput.value = '';
        }
    }

    function eliminarProducto(button, tipo, productoId, cantidad) {
        // Eliminar la fila visualmente
        let li = button.parentElement;
        li.remove();

        // Buscar y eliminar los inputs ocultos correspondientes al producto
        let inputsProducto = document.querySelectorAll(`input[name="productos_${tipo}[]"][value="${productoId}"]`);
        let inputsCantidad = document.querySelectorAll(`input[name="cantidades_${tipo}[]"][value="${cantidad}"]`);

        inputsProducto.forEach(input => input.remove());
        inputsCantidad.forEach(input => input.remove());
    }

    // Validaciones antes de procesar el pedido
    document.getElementById('pedido-form').addEventListener('submit', function(event) {
        let numeroMesa = document.getElementById('mesa').value;
        if (numeroMesa.trim() === '') {
            alert('Por favor, ingrese el número de mesa.');
            event.preventDefault();
            return;
        }

        let listaProductos = document.getElementById('lista-productos');
        if (listaProductos.children.length === 0) {
            alert('Por favor, agregue al menos un producto al pedido.');
            event.preventDefault();
            return;
        }

        event.preventDefault();
        $('#confirmModal').modal('show');
    });

    document.getElementById('confirmarPedidoBtn').addEventListener('click', function() {
        document.getElementById('pedido-form').submit();
    });
</script>
@endsection
