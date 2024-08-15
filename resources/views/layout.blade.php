<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chajil Siwan</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos del cuerpo */
        body {
            font-family: 'Arial', sans-serif;
            padding-top: 56px;
            background-color: #e0f2f1; /* Tono verde claro */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Estilos del navbar */
        .navbar {
            background: #0d3d2e; /* Verde oscuro */
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff !important;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important; /* Texto blanco para los enlaces */
        }
        .navbar-nav .nav-link:hover {
            color: #c8e6c9 !important; /* Verde claro al pasar el ratón */
        }

        /* Hero section */
        .hero {
            background: url('{{ asset('imagenes/Chajil.png') }}') no-repeat center center;
            background-size: cover;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .hero p {
            font-size: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }

        /* Contenido principal */
        .content {
            padding: 2rem 0;
            flex: 1;
        }

        /* Botones personalizados */
        .btn-custom {
            background-color: #0d3d2e; /* Botones verde oscuro */
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #66bb6a; /* Verde más claro al pasar el ratón */
        }

        /* Galería de imágenes */
        .gallery img {
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            background: #0d3d2e; /* Verde oscuro */
            color: white;
            padding: 1rem 0;
            text-align: center;
            margin-top: auto;
        }
        footer a {
            color: #c8e6c9; /* Verde claro para los enlaces del footer */
        }
        footer a:hover {
            color: white;
        }
        .footer-icons a {
            color: white;
            margin: 0 10px;
            font-size: 1.2rem;
        }
        .footer-icons a:hover {
            color: #c8e6c9; /* Verde claro al pasar el ratón */
        }
    </style>
</head>
<body>
    <!-- Incluyendo el navbar -->
    @include('partials.navbar')

    <!-- Contenedor principal -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Chajil Siwan. Todos los derechos reservados.</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Inicio</a></li>
            <li class="list-inline-item"><a href="#">Acerca de Nosotros</a></li>
            <li class="list-inline-item"><a href="#">Eventos</a></li>
            <li class="list-inline-item"><a href="#">Contáctanos</a></li>
        </ul>
        <div class="footer-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <!-- Carga de Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
