<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use Illuminate\Http\Request;

class GestionActividadesController extends Controller
{
    // Mostrar todas las actividades
    public function index() {
        $actividades = Actividad::all();
        return view('admin.gestion-actividades', compact('actividades'));
    }

    // Agregar una nueva actividad
    public function store(Request $request) {
        // Validaciones
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'costo' => 'required|numeric',
        ]);

        Actividad::create($request->only(['nombre', 'descripcion', 'costo']));

        return redirect()->route('admin.gestion-actividades')->with('success', 'Actividad creada con éxito.');
    }

    // Actualizar una actividad existente
    public function update(Request $request, $id) {
        // Buscar la actividad o devolver un error 404 si no existe
        $actividad = Actividad::findOrFail($id);

        // Validaciones
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'costo' => 'required|numeric',
        ]);

        $actividad->update($request->only(['nombre', 'descripcion', 'costo']));

        return redirect()->route('admin.gestion-actividades')->with('success', 'Actividad actualizada con éxito.');
    }

    // Eliminar una actividad
    public function destroy($id) {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();

        return redirect()->route('admin.gestion-actividades')->with('success', 'Actividad eliminada con éxito.');
    }
}
