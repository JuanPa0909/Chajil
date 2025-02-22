@extends('layout')

@section('content')
<div class="container py-5">
    <h1 class="text-center">Modificar Pedidos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($pedidos as $pedido)
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Pedido #{{ $pedido->id_pedido }}</h5>
                    <p><strong>Mesa:</strong> {{ $pedido->id_mesa }}</p>
                    <p><strong>Creado por:</strong> {{ $pedido->usuario->nombres}} {{ $pedido->usuario->apellidos }}</p>
                    @if($pedido->modificador)
                        <p><strong>Última modificación por:</strong> {{ $pedido->modificador->nombres}} {{ $pedido->usuario->apellidos }}</p>
                    @endif
                    <ul>
                        @foreach($pedido->detalles as $detalle)
                            <li>{{ $detalle->cantidad }} x {{ $detalle->menu->nombre ?? $detalle->bebida->nombre }} (Q{{ $detalle->subtotal }})</li>
                        @endforeach
                    </ul>

                    <form method="POST" action="{{ route('pedidos.actualizar', $pedido->id_pedido) }}">
                        @csrf
                        <div class="form-group">
                            <label>Producto</label>
                            <select name="producto" class="form-control">
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id_menu }}-menu">{{ $menu->nombre }} (Q{{ $menu->precio }})</option>
                                @endforeach
                                @foreach($bebidas as $bebida)
                                    <option value="{{ $bebida->id_bebida }}-bebida">{{ $bebida->nombre }} (Q{{ $bebida->precio }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" name="cantidad" class="form-control" value="1" min="1">
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
