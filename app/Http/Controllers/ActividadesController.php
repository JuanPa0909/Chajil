<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function index()
    {
        return view('actividades.index'); // Esto devolverá la vista actividades/index.blade.php
    }
}
