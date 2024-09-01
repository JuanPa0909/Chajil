<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(45deg, #225b60, #1b3b40); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 10px; margin: 10px 20px;">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ route('home') }}" style="font-size: 1.8rem;">Chajil Siwan</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}" style="padding: 10px 20px; border-radius: 25px; transition: background 0.3s;">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('acerca') }}" style="padding: 10px 20px; border-radius: 25px; transition: background 0.3s;">Acerca de Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="padding: 10px 20px; border-radius: 25px; transition: background 0.3s;">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservaciones') }}" style="padding: 10px 20px; border-radius: 25px; transition: background 0.3s;">Reservaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" style="padding: 10px 20px; border-radius: 25px; transition: background 0.3s;">Administrativo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>