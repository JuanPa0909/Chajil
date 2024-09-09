<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Bebida;
use Illuminate\Http\Request;

class GestionMenuController extends Controller
{
    // Mostrar los menús y bebidas
    public function index() {
        $menus = Menu::all();
        $bebidas = Bebida::all();
        return view('admin.gestion-menu', compact('menus', 'bebidas'));
    }

    // agregar un nuevo menú
    public function storeMenu(Request $request) {
        Menu::create($request->only(['nombre', 'descripcion', 'precio', 'tipo_menu']));
        return redirect()->route('admin.gestion-menu')->with('success', 'Menú creado con éxito.');
    }

    // agregar una nueva bebida
    public function storeBebida(Request $request) {
        Bebida::create($request->only(['nombre', 'descripcion', 'precio', 'tipo_bebida']));
        return redirect()->route('admin.gestion-menu')->with('success', 'Bebida creada con éxito.');
    }

    // Actualizar menú
    public function updateMenu(Request $request, $id) {
        $menu = Menu::findOrFail($id);
        $menu->update($request->only(['nombre', 'descripcion', 'precio', 'tipo_menu']));
        return redirect()->route('admin.gestion-menu')->with('success', 'Menú actualizado con éxito.');
    }

    // Actualizar bebida
    public function updateBebida(Request $request, $id) {
        $bebida = Bebida::findOrFail($id);
        $bebida->update($request->only(['nombre', 'descripcion', 'precio', 'tipo_bebida']));
        return redirect()->route('admin.gestion-menu')->with('success', 'Bebida actualizada con éxito.');
    }

    // Eliminar menú
    public function deleteMenu($id) {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.gestion-menu')->with('success', 'Menú eliminado con éxito.');
    }

    // Eliminar bebida
    public function deleteBebida($id) {
        $bebida = Bebida::findOrFail($id);
        $bebida->delete();
        return redirect()->route('admin.gestion-menu')->with('success', 'Bebida eliminada con éxito.');
    }
}