@extends('layout')

@section('content')
<div class="container">
    <h1 class="text-center">Gestión del Menú y Bebidas</h1>

    <!-- Botones para desplegar los formularios -->
    <div class="d-flex justify-content-center mb-4">
        <button class="btn btn-primary mx-2" onclick="mostrarFormulario('menu', null)">Agregar Menú</button>
        <button class="btn btn-primary mx-2" onclick="mostrarFormulario('bebida', null)">Agregar Bebida</button>
    </div>

    <!-- Formulario para agregar o editar un menú -->
    <div id="formulario_menu" class="d-none">
        <h2 id="titulo_formulario_menu">Agregar Menú</h2>
        <form action="{{ route('admin.store-menu') }}" method="POST" id="menuForm">
            @csrf
            <input type="hidden" name="id_menu" id="id_menu">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre del Menú</label>
                        <input type="text" name="nombre" class="form-control" id="nombre_menu" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion_menu" required>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" class="form-control" id="precio_menu" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo_menu">Tipo de Menú</label>
                        <select name="tipo_menu" class="form-control" id="tipo_menu" required>
                            <option value="">Seleccionar tipo de menú...</option>
                            <option value="desayuno">Desayuno</option>
                            <option value="almuerzo">Almuerzo</option>
                            <option value="refaccion">Refacción</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success" id="boton_formulario_menu">Agregar Menú</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Formulario para agregar o editar una bebida -->
    <div id="formulario_bebida" class="d-none">
        <h2 id="titulo_formulario_bebida">Agregar Bebida</h2>
        <form action="{{ route('admin.store-bebida') }}" method="POST" id="bebidaForm">
            @csrf
            <input type="hidden" name="id_bebida" id="id_bebida">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre de la Bebida</label>
                        <input type="text" name="nombre" class="form-control" id="nombre_bebida" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion_bebida" required>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" class="form-control" id="precio_bebida" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo_bebida">Tipo de Bebida</label>
                        <select name="tipo_bebida" class="form-control" id="tipo_bebida" required>
                            <option value="">Seleccionar tipo de bebida...</option>
                            <option value="caliente">Caliente</option>
                            <option value="fria">Fría</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success" id="boton_formulario_bebida">Agregar Bebida</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Dropdown para seleccionar Menús o Bebidas -->
    <div class="form-group">
        <label for="tipo_seleccion">Seleccionar categoría</label>
        <select id="tipo_seleccion" class="form-control" onchange="mostrarOpciones()">
            <option value="">Seleccionar opción...</option>
            <option value="menus">Menús</option>
            <option value="bebidas">Bebidas</option>
        </select>
    </div>

    <!-- Dropdown para filtrar Menús por tipo -->
    <div class="form-group d-none" id="filtro_menus">
        <label for="tipo_menu_filtro">Filtrar por tipo de Menú</label>
        <select id="tipo_menu_filtro" class="form-control" onchange="filtrarMenus()">
            <option value="todos">Todos</option>
            <option value="desayuno">Desayuno</option>
            <option value="almuerzo">Almuerzo</option>
            <option value="refaccion">Refacción</option>
        </select>
    </div>

    <!-- Dropdown para filtrar Bebidas por tipo -->
    <div class="form-group d-none" id="filtro_bebidas">
        <label for="tipo_bebida_filtro">Filtrar por tipo de Bebida</label>
        <select id="tipo_bebida_filtro" class="form-control" onchange="filtrarBebidas()">
            <option value="todos">Todas</option>
            <option value="caliente">Caliente</option>
            <option value="fria">Fría</option>
        </select>
    </div>

    <!-- Listar menús existentes -->
    <h2 class="d-none" id="titulo_menus">Menús Existentes</h2>
    <div id="contenedor_menus" class="d-none">
        @foreach($menus as $menu)
        <div class="card mb-4 menu-item" data-tipo-menu="{{ $menu->tipo_menu }}">
            <div class="card-header d-flex justify-content-between">
                <h5>{{ $menu->nombre }} - Q{{ $menu->precio }} ({{ ucfirst($menu->tipo_menu) }})</h5>
                <div>
                    <!-- Botón para editar el menú -->
                    <button class="btn btn-warning btn-sm mx-1" onclick="editarMenu({{ $menu->id_menu }}, '{{ $menu->nombre }}', '{{ $menu->descripcion }}', '{{ $menu->precio }}', '{{ $menu->tipo_menu }}')">Editar</button>

                    <!-- Botón para eliminar el menú -->
                    <form action="{{ route('admin.delete-menu', $menu->id_menu) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Listar bebidas existentes -->
    <h2 class="d-none" id="titulo_bebidas">Bebidas Existentes</h2>
    <div id="contenedor_bebidas" class="d-none">
        @foreach($bebidas as $bebida)
        <div class="card mb-4 bebida-item" data-tipo-bebida="{{ $bebida->tipo_bebida }}">
            <div class="card-header d-flex justify-content-between">
                <h5>{{ $bebida->nombre }} - Q{{ $bebida->precio }} ({{ ucfirst($bebida->tipo_bebida) }})</h5>
                <div>
                    <!-- Botón para editar la bebida -->
                    <button class="btn btn-warning btn-sm mx-1" onclick="editarBebida({{ $bebida->id_bebida }}, '{{ $bebida->nombre }}', '{{ $bebida->descripcion }}', '{{ $bebida->precio }}', '{{ $bebida->tipo_bebida }}')">Editar</button>

                    <!-- Botón para eliminar la bebida -->
                    <form action="{{ route('admin.delete-bebida', $bebida->id_bebida) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Mostrar formularios de Menú o Bebida
    function mostrarFormulario(tipo, item = null) {
        document.getElementById('formulario_menu').classList.add('d-none');
        document.getElementById('formulario_bebida').classList.add('d-none');

        if (tipo === 'menu') {
            document.getElementById('formulario_menu').classList.remove('d-none');
        } else if (tipo === 'bebida') {
            document.getElementById('formulario_bebida').classList.remove('d-none');
        }
    }

    // Mostrar opciones de filtro
    function mostrarOpciones() {
        const tipoSeleccion = document.getElementById('tipo_seleccion').value;

        // Ocultar todos los filtros, títulos y contenedores por defecto
        document.getElementById('filtro_menus').classList.add('d-none');
        document.getElementById('filtro_bebidas').classList.add('d-none');
        document.getElementById('titulo_menus').classList.add('d-none');
        document.getElementById('contenedor_menus').classList.add('d-none');
        document.getElementById('titulo_bebidas').classList.add('d-none');
        document.getElementById('contenedor_bebidas').classList.add('d-none');

        // Mostrar los filtros y contenidos según la selección
        if (tipoSeleccion === 'menus') {
            document.getElementById('filtro_menus').classList.remove('d-none');
            document.getElementById('titulo_menus').classList.remove('d-none');
            document.getElementById('contenedor_menus').classList.remove('d-none');
            filtrarMenus();  // Filtrar menús por defecto
        } else if (tipoSeleccion === 'bebidas') {
            document.getElementById('filtro_bebidas').classList.remove('d-none');
            document.getElementById('titulo_bebidas').classList.remove('d-none');
            document.getElementById('contenedor_bebidas').classList.remove('d-none');
            filtrarBebidas();  // Filtrar bebidas por defecto
        }
    }

    // Filtrar Menús por tipo
    function filtrarMenus() {
        const tipoFiltro = document.getElementById('tipo_menu_filtro').value;
        const menus = document.querySelectorAll('.menu-item');

        menus.forEach(menu => {
            if (tipoFiltro === 'todos' || menu.getAttribute('data-tipo-menu') === tipoFiltro) {
                menu.style.display = 'block';
            } else {
                menu.style.display = 'none';
            }
        });
    }

    // Filtrar Bebidas por tipo
    function filtrarBebidas() {
        const tipoFiltro = document.getElementById('tipo_bebida_filtro').value;
        const bebidas = document.querySelectorAll('.bebida-item');

        bebidas.forEach(bebida => {
            if (tipoFiltro === 'todos' || bebida.getAttribute('data-tipo-bebida') === tipoFiltro) {
                bebida.style.display = 'block';
            } else {
                bebida.style.display = 'none';
            }
        });
    }

    // Función para editar Menú
    function editarMenu(id, nombre, descripcion, precio, tipo) {
        document.getElementById('id_menu').value = id;
        document.getElementById('nombre_menu').value = nombre;
        document.getElementById('descripcion_menu').value = descripcion;
        document.getElementById('precio_menu').value = precio;
        document.getElementById('tipo_menu').value = tipo;

        document.getElementById('titulo_formulario_menu').innerText = 'Editar Menú';
        document.getElementById('boton_formulario_menu').innerText = 'Guardar Cambios';
        document.getElementById('menuForm').setAttribute('action', `{{ route('admin.update-menu', '') }}/${id}`);
        mostrarFormulario('menu');
    }

    // Función para editar Bebida
    function editarBebida(id, nombre, descripcion, precio, tipo) {
        document.getElementById('id_bebida').value = id;
        document.getElementById('nombre_bebida').value = nombre;
        document.getElementById('descripcion_bebida').value = descripcion;
        document.getElementById('precio_bebida').value = precio;
        document.getElementById('tipo_bebida').value = tipo;

        document.getElementById('titulo_formulario_bebida').innerText = 'Editar Bebida';
        document.getElementById('boton_formulario_bebida').innerText = 'Guardar Cambios';
        document.getElementById('bebidaForm').setAttribute('action', `{{ route('admin.update-bebida', '') }}/${id}`);
        mostrarFormulario('bebida');
    }
</script>
@endsection
