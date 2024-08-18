<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', function () {
    return view('login');
})->name('login');

// Añadir la ruta para procesar el login, por ejemplo:
Route::post('/login', 'AuthController@login')->name('login.post');

Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->name('user.dashboard');
Route::get('/restaurante', [App\Http\Controllers\RestauranteController::class, 'index'])->name('restaurante.index');

Route::get('/actividades', [App\Http\Controllers\ActividadesController::class, 'index'])->name('actividades.index');
