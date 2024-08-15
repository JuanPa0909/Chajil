@extends('layout')

@section('content')
<div class="d-flex" id="wrapper">
    <!-- Sidebar Fijo -->
    <div class="bg-dark" id="sidebar-wrapper" style="width: 250px;">
        <div class="sidebar-heading text-white py-4 text-center">Menú Principal</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Restaurante</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Actividades</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Contenido Principal -->
    <div id="page-content-wrapper" style="flex: 1;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <h2 class="text-dark">Panel de Control</h2>
        </nav>

        <div class="container-fluid">
            <h1 class="mt-4 text-dark">Bienvenido al Menú Principal</h1>
            <div class="card-deck mt-4">
                <div class="card border-dark">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">Restaurante</h5>
                        <p class="card-text">Gestiona las operaciones del restaurante.</p>
                        <a href="#" class="btn btn-dark">Ir a Restaurante</a>
                    </div>
                </div>
                <div class="card border-dark">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">Actividades</h5>
                        <p class="card-text">Gestiona las actividades del parque.</p>
                        <a href="#" class="btn btn-dark">Ir a Actividades</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<style>
    body {
        overflow-x: hidden;
        background: linear-gradient(to bottom, #004d40, #00796b); /* Degradado verde oscuro */
        height: 100vh;
        margin: 0;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        background-color: #004d40; /* Verde oscuro */
        border-right: 1px solid #004d40;
    }

    #sidebar-wrapper .sidebar-heading {
        background-color: #003d33; /* Verde más oscuro */
        font-size: 1.5rem;
        text-align: center;
    }

    #sidebar-wrapper .list-group-item {
        background-color: #004d40;
        border: none;
        font-size: 1.1rem;
        padding: 15px;
    }

    #sidebar-wrapper .list-group-item:hover {
        background-color: #00695c; /* Verde más claro */
    }

    #page-content-wrapper {
        padding: 20px;
    }

    .card {
        background-color: #e0f2f1; /* Fondo de tarjeta verde claro */
    }

    .btn-dark {
        background-color: #004d40;
        border: none;
        color: white;
    }

    .btn-dark:hover {
        background-color: #00695c;
        color: white;
    }
</style>
@endsection
