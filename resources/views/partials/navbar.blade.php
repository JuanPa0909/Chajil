<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(45deg, #225b60, #1b3b40); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 10px; margin: 10px 20px; padding: 20px 0; transition: all 0.3s ease;">
    <div class="container">
        <a class="navbar-brand font-weight-bold d-flex align-items-center" href="{{ route('home') }}" style="font-size: 2.2rem; transition: transform 0.3s; transform-origin: left; padding-left: 10px;">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Logo Parque" style="height: 50px; margin-right: 10px; transition: transform 0.3s;"> <!-- Ajusta la altura del logo según sea necesario -->
            Chajil Siwan
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="outline: none; transition: transform 0.4s; background-color: rgba(255, 255, 255, 0.2); border-radius: 5px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @auth
                    <!-- Botón de Dashboard visible solo si el usuario está autenticado -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s ease, transform 0.3s ease; cursor: pointer;">
                            Dashboard
                        </a>
                    </li>
                    <!-- Bienvenida al usuario autenticado -->
                    <li class="nav-item">
                        <span class="nav-link text-white font-weight-bold" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s;">Bienvenido, {{ Auth::user()->nombres }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s; cursor: pointer; background-color: transparent; border: none;">Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s ease, transform 0.3s ease; cursor: pointer;">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('acerca') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s ease, transform 0.3s ease; cursor: pointer;">
                            Acerca de Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('diversion') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s ease, transform 0.3s ease; cursor: pointer;">
                            Actividades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservaciones') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s ease, transform 0.3s ease; cursor: pointer;">
                            Reservaciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s ease, transform 0.3s ease; cursor: pointer;">
                            Administrativo
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Efectos hover para enlaces del navbar */
    .navbar-nav .nav-link {
        position: relative;
        overflow: hidden;
    }

    .navbar-nav .nav-link::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.2);
        top: 100%;
        left: 0;
        transition: all 0.3s ease;
        z-index: 1;
    }

    .navbar-nav .nav-link:hover::before {
        top: 0;
    }

    .navbar-nav .nav-link:hover {
        transform: translateY(-2px);
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Efecto hover para el logo */
    .navbar-brand:hover {
        transform: scale(1.1);
    }

    .navbar-brand img:hover {
        transform: rotate(15deg);
    }

    /* Estilos para el botón de colapso del navbar */
    .navbar-toggler:hover {
        transform: scale(1.1);
        background-color: rgba(255, 255, 255, 0.3);
    }

    /* Sombras suaves al hacer hover */
    .navbar-nav .nav-link:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
</style>
