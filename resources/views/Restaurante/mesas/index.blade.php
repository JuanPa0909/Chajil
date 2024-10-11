@extends('layout')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4" style="color: #004d40;">Gestión de Mesas</h1>
        <table class="table table-hover">
            <thead>
                <tr style="background-color: #00695c; color: #ffffff;">
                    <th>Número de Mesa</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mesas as $mesa)
                    <tr>
                        <td>{{ $mesa->numero_mesa }}</td>
                        <td>
                            <i class="fas {{ $mesa->estado_mesa == 'ocupada' ? 'fa-times-circle' : ($mesa->estado_mesa == 'reservada' ? 'fa-clock' : 'fa-check-circle') }}" style="color: {{ $mesa->estado_mesa == 'ocupada' ? '#c62828' : ($mesa->estado_mesa == 'reservada' ? '#f9a825' : '#2e7d32') }};"></i>
                            {{ ucfirst($mesa->estado_mesa) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .table-hover tbody tr:hover {
            background-color: #e0f2f1;
        }
        .table thead th {
            font-size: 1.2rem;
        }
        .table tbody td {
            font-size: 1.1rem;
            vertical-align: middle;
        }
    </style>
@endsection
