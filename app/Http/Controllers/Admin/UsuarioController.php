<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.gestion-usuarios', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_usuario' => 'required|string|max:50',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'telefono' => 'nullable|string|max:15',
            'estado' => 'required|string|in:activo,inactivo',
            'password' => 'required|string|min:8|confirmed', // Validación de la contraseña minimo 8 caracteres
        ]);

        $data = $request->all();
        $data['password'] = $request->password; // encriptacion de contraseña

        Usuario::create($data);

        return redirect()->route('admin.gestion-usuarios')->with('success', 'Usuario creado con éxito');
    }

    public function edit($id)
    {
        $usuarios = Usuario::all();
        $usuarioEdit = Usuario::findOrFail($id);
        return view('admin.gestion-usuarios', compact('usuarios', 'usuarioEdit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_usuario' => 'required|string|max:50',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . $id . ',id_usuario',
            'telefono' => 'nullable|string|max:15',
            'estado' => 'required|string|in:activo,inactivo',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $usuario = Usuario::findOrFail($id);
    
        // si se actualiza la contraseña de encripta 
        if ($request->filled('password')) {
            $usuario->password = $request->password;
        }
    
        $usuario->update($request->except('password'));
    
        return redirect()->route('admin.gestion-usuarios')->with('success', 'Usuario actualizado con éxito');
    }
    
//eliminar usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.gestion-usuarios')->with('success', 'Usuario eliminado con éxito');
    }
}
