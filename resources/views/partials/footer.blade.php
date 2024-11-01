<footer class="text-light" style="background-color: #1b3b40; padding: 30px 0; box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container text-center">
        <div class="row">
            <!-- Columna de Enlaces Rápidos -->
            <div class="col-md-3 mb-3">
                <h5 class="font-weight-bold text-uppercase">Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light">Inicio</a></li>
                    <li><a href="{{ route('acerca') }}" class="text-light">Acerca de Nosotros</a></li>
                    <li><a href="{{ route('diversion') }}" class="text-light">Actividades</a></li>
                    <li><a href="{{ route('reservaciones') }}" class="text-light">Reservaciones</a></li>

                </ul>
            </div>
            <!-- Columna de Contacto -->
            <div class="col-md-3 mb-3">
                <h5 class="font-weight-bold text-uppercase">Contáctanos</h5>
                <p class="mb-1">Dirección: Totonicapán, Guatemala</p>
                <p class="mb-1">Teléfono: +502 5375-7051</p>
                <p class="mb-1">Correo: parquechajilsiwan@gmail.com</p>
            </div>
            <!-- Columna de Redes Sociales -->
            <div class="col-md-3 mb-3">
                <h5 class="font-weight-bold text-uppercase">Síguenos</h5>
                <a href="https://www.facebook.com/parquechajilsiwan/?locale=es_LA" class="text-light mr-3"><i class="fab fa-facebook fa-lg" style="color: #ffffff;"></i></a>
            </div>
            <!-- Columna de Logo UMG -->
            <div class="col-md-3 mb-3">
                <div class="mt-3">
                    <img src="{{ asset('imagenes/umg.png') }}" alt="Logo UMG" style="height: 150px;">
                </div>
            </div>
        </div>
        <hr style="background-color: rgba(255, 255, 255, 0.2);">
        <p class="mb-0">&copy; 2024 Chajil Siwan. Todos los derechos reservados.</p>
    </div>
</footer>
