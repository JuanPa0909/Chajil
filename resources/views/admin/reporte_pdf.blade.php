<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        h1, h2, h3 {
            text-align: center;
            color: #004d40;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        .section-title {
            background-color: #004d40;
            color: #fff;
            padding: 5px;
            text-align: center;
            font-size: 1.2rem;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #004d40;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Reporte Detallado de Ventas</h1>
    <p>Fecha de inicio: {{ $fechaInicio->toDateString() }} - Fecha de fin: {{ $fechaFin->toDateString() }}</p>

    <!-- Resumen de Ganancias -->
    <div>
        <h2>Resumen de Ganancias</h2>
        <p><strong>Ganancias del Mes Actual:</strong> Q{{ number_format($totalGananciasMesActual, 2) }}</p>
        <p><strong>Ganancias del Mes Anterior:</strong> Q{{ number_format($totalGananciasMesAnterior, 2) }}</p>
        <p><strong>Total de Pedidos:</strong> {{ $totalPedidos }}</p>
    </div>

    <!-- Resumen de Menús Vendidos -->
    <div class="section-title">Menús Vendidos</div>
    @if($menuesVendidos->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Nombre del Menú</th>
                    <th>Tipo</th>
                    <th>Cantidad Vendida</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuesVendidos as $menu)
                <tr>
                    <td>{{ $menu['nombre'] }}</td>
                    <td>{{ ucfirst($menu['tipo']) }}</td>
                    <td>{{ $menu['cantidad'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se han vendido menús en este rango de fechas.</p>
    @endif

    <!-- Resumen de Bebidas Vendidas -->
    <div class="section-title">Bebidas Vendidas</div>
    @if($bebidasVendidas->isNotEmpty())
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
    @else
        <p>No se han vendido bebidas en este rango de fechas.</p>
    @endif

    <!-- Resumen de Categorías de Menús Vendidos -->
    <div>
        <h3>Resumen de Categorías de Menús</h3>
        <ul>
            <li><strong>Desayunos Vendidos:</strong> {{ $desayunosVendidos }}</li>
            <li><strong>Almuerzos Vendidos:</strong> {{ $almuerzosVendidos }}</li>
            <li><strong>Cenas Vendidas:</strong> {{ $cenasVendidas }}</li>
        </ul>
    </div>
</div>

</body>
</html>
