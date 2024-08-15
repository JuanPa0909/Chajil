<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(to right, #004d40, #00796b);">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="#" style="color: #ffffff;">Chajil Siwan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('/')) active @endif" href="#" style="color: #ffffff;">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('acerca-de-nosotros')) active @endif" href="#" style="color: #ffffff;">Acerca de Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('eventos')) active @endif" href="#" style="color: #ffffff;">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('contactanos')) active @endif" href="#" style="color: #ffffff;">Contáctanos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('login')) active @endif" href="{{ route('login') }}" style="color: #ffffff;">Administrativo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link {
        margin-right: 15px;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #c8e6c9 !important; /* Verde claro al pasar el ratón */
    }

    .navbar-nav .nav-link.active {
        border-bottom: 2px solid #ffffff; /* Indicador de enlace activo */
        color: #ffffff !important;
    }

    .navbar-brand {
        font-size: 1.75rem;
    }
</style>

