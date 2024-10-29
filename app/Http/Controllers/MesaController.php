<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa; 
class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all(); 

        return view('Restaurante.mesas.index', compact('mesas'));
    }
}
