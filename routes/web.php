<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\GestionMenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsuarioController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');


//login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


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
// #pendiente Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/gestion-menu', [MenuController::class, 'index'])->name('admin.gestion-menu');
Route::get('/admin/gestion-actividades', [ActivityController::class, 'index'])->name('admin.gestion-actividades');

//Rutas del Restaurante
Route::get('/restaurante/menu/index', [MenuController::class, 'index'])->name('menu.index');

//rutas edicion de usuarios 
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('gestion-usuarios', [UsuarioController::class, 'index'])->name('admin.gestion-usuarios');
    Route::post('usuarios', [UsuarioController::class, 'store'])->name('admin.usuarios.store');
    Route::get('usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit');
    Route::put('usuarios/{id}', [UsuarioController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');
});


//Rutas gestion Menu
Route::get('/gestion-menu', [GestionMenuController::class, 'index'])->name('admin.gestion-menu');
Route::post('/gestion-menu/store-menu', [GestionMenuController::class, 'storeMenu'])->name('admin.store-menu');
Route::post('/gestion-menu/store-bebida', [GestionMenuController::class, 'storeBebida'])->name('admin.store-bebida');
Route::put('/gestion-menu/update-menu/{id}', [GestionMenuController::class, 'updateMenu'])->name('admin.update-menu');
Route::put('/gestion-menu/update-bebida/{id}', [GestionMenuController::class, 'updateBebida'])->name('admin.update-bebida');
Route::delete('/gestion-menu/delete-menu/{id}', [GestionMenuController::class, 'deleteMenu'])->name('admin.delete-menu');
Route::delete('/gestion-menu/delete-bebida/{id}', [GestionMenuController::class, 'deleteBebida'])->name('admin.delete-bebida');
