<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\GestionMenuController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', 'AuthController@login')->name('login.post');

Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->name('user.dashboard');

Route::get('/restaurante', [App\Http\Controllers\RestauranteController::class, 'index'])->name('restaurante.index');
Route::get('/actividades', [App\Http\Controllers\ActividadesController::class, 'index'])->name('actividades.index');
Route::get('/reservaciones', function () {
    return view('reservaciones');
})->name('reservaciones');
Route::get('/acerca', function () {
    return view('acerca');
})->name('acerca');

//Rutas del admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/gestion-menu', [MenuController::class, 'index'])->name('admin.gestion-menu');
Route::get('/admin/gestion-actividades', [ActivityController::class, 'index'])->name('admin.gestion-actividades');

//Rutas del Restaurante
Route::get('/restaurante/menu/index', [MenuController::class, 'index'])->name('menu.index');


