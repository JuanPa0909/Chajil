<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(45deg, #225b60, #1b3b40); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 10px; margin: 10px 20px; padding: 20px 0;">
    <div class="container">
        <a class="navbar-brand font-weight-bold d-flex align-items-center" href="{{ route('home') }}" style="font-size: 2.2rem; transition: transform 0.3s;">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Logo Parque" style="height: 50px; margin-right: 10px;"> <!-- Ajusta la altura del logo según sea necesario -->
            Chajil Siwan
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="outline: none; transition: transform 0.4s;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @auth
                    <!-- Botón de Dashboard visible solo si el usuario está autenticado -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s; cursor: pointer;">Dashboard</a>
                    </li>
                    <!-- Bienvenida al usuario autenticado -->
                    <li class="nav-item">
                        <span class="nav-link text-white font-weight-bold" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s;">Bienvenido, {{ Auth::user()->nombres }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s; cursor: pointer;">Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s; cursor: pointer;">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('acerca') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s; cursor: pointer;">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('diversion') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s; cursor: pointer;">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservaciones') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s; cursor: pointer;">Reservaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; transition: background 0.3s, transform 0.3s; cursor: pointer;">Administrativo</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
