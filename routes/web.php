<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\GestionMenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\GestionActividadesController; 
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\PagoActividad;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\admin\GestionPagosAdminController;
use App\Http\Controllers\ReporteActividadesController;
use App\Http\Controllers\ReporteGeneralController;


// recuperar contraseña
Auth::routes(['verify' => true]);
Route::get('password/reset', [PasswordResetLinkController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordResetLinkController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [NewPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [NewPasswordController::class, 'reset'])->name('password.update');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');


//login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/diversion', function () {
    return view('diversion'); 
})->name('diversion');

Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->name('user.dashboard');


Route::get('/restaurante', [App\Http\Controllers\RestauranteController::class, 'index'])->name('restaurante.index');
#Route::get('/actividades', [App\Http\Controllers\ActividadesController::class, 'index'])->name('actividades.index');
//pedidos
Route::get('/pedido/formulario', 'PedidoController@showForm'); 
Route::post('/pedido/store', 'PedidoController@store'); // Procesa el formulario de pedido

Route::get('/acerca', function () {
    return view('acerca');
})->name('acerca');

//Rutas del admin
// #pendiente Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/gestion-menu', [MenuController::class, 'index'])->name('admin.gestion-menu');

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


// Rutas gestion Actividades
Route::get('/admin/gestion-actividades', [GestionActividadesController::class, 'index'])->name('admin.gestion-actividades');
Route::post('/admin/gestion-actividades/store', [GestionActividadesController::class, 'store'])->name('admin.store-actividad');
Route::put('/admin/gestion-actividades/update/{id}', [GestionActividadesController::class, 'update'])->name('admin.update-actividad');
Route::delete('/admin/gestion-actividades/delete/{id}', [GestionActividadesController::class, 'destroy'])->name('admin.delete-actividad');


// Rutas para reservaciones
Route::get('/reservaciones', [CotizacionController::class, 'index'])->name('reservaciones');
Route::post('/reservaciones/procesar', [CotizacionController::class, 'procesarCotizacion'])->name('reservaciones.procesar');
Route::post('/reservaciones/calcular-total', [CotizacionController::class, 'calcularTotal'])->name('reservaciones.calcularTotal');
// Ruta para ver todas las cotizaciones
Route::get('/admin/cotizaciones', [CotizacionController::class, 'verCotizaciones'])->name('admin.cotizaciones');

// Ruta para actualizar el estado de una cotización a "contactado"
Route::put('/admin/cotizaciones/{id}', [CotizacionController::class, 'actualizarEstado'])->name('admin.cotizaciones.update');

// Ruta para eliminar una cotización
Route::delete('/admin/cotizaciones/{id}', [CotizacionController::class, 'eliminarCotizacion'])->name('admin.cotizaciones.destroy');

//pedidos
Route::post('/pedido/store', [PedidoController::class, 'store'])->name('pedido.store');


//rutas cobro actividades
Route::get('/actividades', [ActividadesController::class, 'index'])->name('actividades.index');
Route::post('/actividades/pagar/{id_actividad}', [ActividadesController::class, 'registrarPago'])->name('actividades.pagar');

//ruta mesas
Route::get('/mesas', [MesaController::class, 'index'])->name('mesas.index');


Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');



//REPORTES
Route::get('/admin/reportes', [ReporteController::class, 'index'])->name('admin.reportes');
Route::get('/admin/reportes/pdf', [ReporteController::class, 'generarPDF'])->name('admin.reportes.pdf');
// Ruta para el reporte de actividades
Route::get('admin/reporte-actividades', [ReporteActividadesController::class, 'index'])->name('admin.reporte-actividades');
// Ruta para generar el PDF del reporte de actividades
Route::get('admin/reporte-actividades/pdf', [ReporteActividadesController::class, 'generarPDF'])->name('admin.reporte-actividades.pdf');
// Ruta para mostrar el reporte general
Route::get('admin/reporte-general', [ReporteGeneralController::class, 'index'])->name('admin.reporte-general');
// Ruta para generar el PDF del reporte general
Route::get('admin/reporte-general/pdf', [ReporteGeneralController::class, 'generarPDF'])->name('admin.reporte-general.pdf');

// Ruta para mostrar la vista de gestión de pagos
Route::get('/admin/gestion-pagos', [GestionPagosAdminController::class, 'gestionPagos'])->name('admin.gestion-pagos');

// Ruta para revertir un pago usando el ID
Route::delete('/admin/revertir-pago/{id}', [GestionPagosAdminController::class, 'revertirPago'])->name('admin.revertir-pago');

// Ruta para actualizar un pago
Route::post('/admin/actualizar-pago/{id}', [GestionPagosAdminController::class, 'actualizarPago'])->name('admin.actualizar-pago');
