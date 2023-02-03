<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Venta;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Esta función nos permite generar un JSON en donde obtenemos todas las ventas en una colleción */
Route::get('/ventas', function()
{
    return Venta::all();
});