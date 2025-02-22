<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(45deg, #225b60, #1b3b40); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 10px; margin: 10px 20px; padding: 20px 0; transition: all 0.3s ease;">
    <div class="container">
        <a class="navbar-brand font-weight-bold d-flex align-items-center" href="{{ route('home') }}" style="font-size: 2.2rem; transition: transform 0.3s; transform-origin: left; padding-left: 10px;">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Logo Parque" style="height: 50px; margin-right: 10px; transition: transform 0.3s;">
            Chajil Siwan
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="outline: none; transition: transform 0.4s; background-color: rgba(255, 255, 255, 0.2); border-radius: 5px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @auth
                    @if(Auth::user()->tipo_usuario === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px;">Dashboard Admin</a>
                        </li>
                    @elseif(Auth::user()->tipo_usuario === 'usuario')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px;">Dashboard Usuario</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <span class="nav-link text-white font-weight-bold" style="padding: 15px 25px; font-size: 1.1rem;">Bienvenido, {{ Auth::user()->nombres }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white" style="padding: 15px 25px; font-size: 1.1rem; border-radius: 25px; background-color: transparent; border: none;">Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('acerca') }}">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('diversion') }}">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservaciones') }}">Reservaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Administrativo</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>