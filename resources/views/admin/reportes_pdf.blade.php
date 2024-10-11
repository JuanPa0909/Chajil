<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background-color: #004d40; color: white; }
        h1, h2, h3 { color: #004d40; text-align: center; }
    </style>
</head>
<body>
    <h1>Reporte Detallado de Ventas</h1>
    <p><strong>Fecha Inicio:</strong> {{ $fechaInicio->format('d/m/Y') }}</p>
    <p><strong>Fecha Fin:</strong> {{ $fechaFin->format('d/m/Y') }}</p>
    <h2>Ganancias Totales</h2>
    <p><strong>Q{{ number_format($totalGananciasMesActual, 2) }}</strong></p>

    <h2>Resumen de Menús Vendidos</h2>
    <ul>
        <li><strong>Desayunos:</strong> {{ $desayunosVendidos }}</li>
        <li><strong>Almuerzos:</strong> {{ $almuerzosVendidos }}</li>
        <li><strong>Cenas:</strong> {{ $cenasVendidas }}</li>
    </ul>

    <h3>Detalle de Menús Vendidos</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre del Menú</th>
                <th>Cantidad Vendida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuesVendidos as $menu)
            <tr>
                <td>{{ $menu['nombre'] }}</td>
                <td>{{ $menu['cantidad'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Resumen de Bebidas Vendidas</h2>
    <p><strong>Total de Bebidas Vendidas:</strong> {{ $bebidasVendidas->sum('cantidad') }}</p>

    <h3>Detalle de Bebidas Vendidas</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre de la Bebida</th>
                <th>Cantidad Vendida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bebidasVendidas as $bebida)
            <tr>
                <td>{{ $bebida['nombre'] }}</td>
                <td>{{ $bebida['cantidad'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
