<?php

/* Son necesarias para conocer y añadir las rutas */
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\SneakerController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //CUCEI
    return view('index');
    //return view('welcome');
});
 
Route::resource('empleado', EmpleadoController::class);
Route::resource('venta', VentaController::class)->parameters(['venta' => 'venta']);
Route::resource('sneaker', SneakerController::class);
Route::resource('archivo', ArchivoController::class);
/* Añadimos las rutas necesarias paraa acceder a los métodos y vistas de nustros SoftDeletes */
Route::get('/ventasPapelera', [VentaController::class, 'ventasPapelera']);
Route::get('/ventas/{id}/ventasRestore', [VentaController::class, 'ventasRestore']);
Route::delete('/ventas/{id}/ventasDelete', [VentaController::class, 'ventasDelete']);
Route::get('/email/ventaRegistrada/{venta}', [VentaController::class, 'notificacionVenta']);
/* Route::patch('/archivo/{archivo}', [VentaController::class, 'update']); */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/index', function () {
        return view('index');
    })->name('index');
});
