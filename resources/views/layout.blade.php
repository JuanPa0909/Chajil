<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chajil Siwan</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Coloca aquí el CSS adicional que se proporcionó para el navbar y footer */
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #e0f2f1 !important;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #c8e6c9 !important;
        }

        footer a {
            color: #e0f2f1;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #66bb6a;
        }

        footer .fab {
            transition: color 0.3s;
        }

        footer .fab:hover {
            color: #66bb6a;
        }

        footer h5 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
