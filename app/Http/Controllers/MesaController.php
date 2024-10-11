<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa; // Asegúrate de usar el modelo correcto

class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all(); // Recupera todas las mesas

        return view('restaurante.mesas.index', compact('mesas'));
    }
}
