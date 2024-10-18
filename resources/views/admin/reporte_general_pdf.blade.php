<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte General</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #004d40;
            color: white;
        }
        h1 {
            color: #004d40;
        }
    </style>
</head>
<body>

    <h1>Reporte General</h1>
    <p><strong>Rango de fechas:</strong> {{ $fechaInicio->format('d/m/Y') }} - {{ $fechaFin->format('d/m/Y') }}</p>

    <!-- Resumen de Actividades -->
    <h2>Resumen de Actividades</h2>
    <p><strong>Total de Actividades Pagadas:</strong> {{ $totalActividades }}</p>
    <p><strong>Total Ingresos por Actividades:</strong> Q{{ number_format($totalIngresosActividades, 2) }}</p>

    <!-- Desglose por Actividad -->
    <h3>Desglose por Actividad</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre de la Actividad</th>
                <th>Total de Tickets Vendidos</th>
                <th>Total Ingresos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actividadesTotales as $actividad)
            <tr>
                <td>{{ $actividad['nombre'] }}</td>
                <td>{{ $actividad['totalTickets'] }}</td>
                <td>Q{{ number_format($actividad['totalMonto'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Resumen del Restaurante -->
    <h2>Resumen del Restaurante</h2>
    <p><strong>Total de Pedidos:</strong> {{ $totalPedidos }}</p>
    <p><strong>Total Ingresos del Restaurante:</strong> Q{{ number_format($totalIngresosRestaurante, 2) }}</p>

    <!-- Desglose por Producto -->
    <h3>Desglose por Producto del Restaurante</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad Vendida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productosVendidos as $producto)
            <tr>
                <td>{{ $producto['nombre'] }}</td>
                <td>{{ $producto['cantidad'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
