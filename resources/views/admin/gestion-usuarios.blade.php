@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <h1 class="text-center font-weight-bold" style="color: #004d40;">Gestión de Usuarios</h1>
    <p class="text-center text-muted mb-5">Administra los usuarios del sistema. Puedes agregar, editar o eliminar usuarios.</p>

    <!-- Formulario para Agregar/Editar Usuario -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                <div class="card-body">
                    <h4 class="text-center mb-4">{{ isset($usuarioEdit) ? 'Editar Usuario' : 'Agregar Usuario' }}</h4>

                    <form action="{{ isset($usuarioEdit) ? route('admin.usuarios.update', $usuarioEdit->id_usuario) : route('admin.usuarios.store') }}" method="POST">
                        @csrf
                        @if(isset($usuarioEdit))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="tipo_usuario">Tipo de Usuario</label>
                            <select name="tipo_usuario" class="form-control" required>
                                <option value="admin" {{ (isset($usuarioEdit) && $usuarioEdit->tipo_usuario == 'admin') ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ (isset($usuarioEdit) && $usuarioEdit->tipo_usuario == 'user') ? 'selected' : '' }}>User</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" class="form-control" value="{{ isset($usuarioEdit) ? $usuarioEdit->nombres : old('nombres') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" value="{{ isset($usuarioEdit) ? $usuarioEdit->apellidos : old('apellidos') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ isset($usuarioEdit) ? $usuarioEdit->email : old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="{{ isset($usuarioEdit) ? $usuarioEdit->telefono : old('telefono') }}">
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control" required>
                                <option value="activo" {{ (isset($usuarioEdit) && $usuarioEdit->estado == 'activo') ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ (isset($usuarioEdit) && $usuarioEdit->estado == 'inactivo') ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña @if(isset($usuarioEdit)) (Dejar en blanco para no cambiar) @endif</label>
                            <input type="password" name="password" class="form-control" {{ isset($usuarioEdit) ? '' : 'required' }}>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" {{ isset($usuarioEdit) ? '' : 'required' }}>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">{{ isset($usuarioEdit) ? 'Actualizar Usuario' : 'Crear Usuario' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Usuarios -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Usuario</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>Fecha Creación</th>
                            <th>Último Acceso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id_usuario }}</td>
                                <td>{{ ucfirst($usuario->tipo_usuario) }}</td>
                                <td>{{ $usuario->nombres }}</td>
                                <td>{{ $usuario->apellidos }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ ucfirst($usuario->estado) }}</td>
                                <td>{{ $usuario->fechaCreacion }}</td>
                                <td>{{ $usuario->ultimoAcceso }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.usuarios.edit', $usuario->id_usuario) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('admin.usuarios.destroy', $usuario->id_usuario) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
