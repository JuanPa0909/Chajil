<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Bebida; 

class MenuController extends Controller
{
    public function index()
    {
        $desayunos = Menu::where('tipo_menu', 'desayuno')->get();
        $almuerzos = Menu::where('tipo_menu', 'almuerzo')->get();
        $refacciones = Menu::where('tipo_menu', 'refaccion')->get();
        $bebidas = Bebida::all(); 

        return view('Restaurante.Menu.index', compact('desayunos', 'almuerzos', 'refacciones', 'bebidas'));
    }
}
