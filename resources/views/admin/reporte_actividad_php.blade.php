<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Actividades</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #004d40; color: white; }
        h1 { color: #004d40; }
    </style>
</head>
<body>

    <h1>Reporte de Actividades</h1>
    <p><strong>Rango de fechas:</strong> {{ $fechaInicio->format('d/m/Y') }} - {{ $fechaFin->format('d/m/Y') }}</p>
    <p><strong>Total de Actividades Pagadas:</strong> {{ $totalActividades }}</p>
    <p><strong>Total de Ingresos:</strong> Q{{ number_format($totalIngresos, 2) }}</p>

    <table>
        <thead>
            <tr>
                <th>Actividad</th>
                <th>Cantidad de Tickets</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actividadesPagadas as $actividad)
            <tr>
                <td>{{ $actividad->actividad->nombre }}</td>
                <td>{{ $actividad->cantidadTickets }}</td>
                <td>Q{{ number_format($actividad->monto, 2) }}</td>
                <td>{{ $actividad->fecha_hora->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
