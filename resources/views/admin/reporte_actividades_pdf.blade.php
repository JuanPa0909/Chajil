<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Actividades</title>
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

    <h1>Reporte Resumido de Actividades</h1>
    <p><strong>Rango de fechas:</strong> {{ $fechaInicio->format('d/m/Y') }} - {{ $fechaFin->format('d/m/Y') }}</p>
    <p><strong>Total de Actividades Pagadas:</strong> {{ $totalActividades }}</p>
    <p><strong>Total de Ingresos:</strong> Q{{ number_format($totalIngresos, 2) }}</p>

    <h2>Desglose por Actividad</h2>
    <table>
        <thead>
            <tr>
                <th>Actividad</th>
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

</body>
</html>
