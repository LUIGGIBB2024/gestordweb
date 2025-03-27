<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\GetEntradasController;
use App\Http\Controllers\api\UpdateCiudadesController;
use App\Http\Controllers\api\UpdateController;
use App\Http\Controllers\api\UpdateFabricantesController;
use App\Http\Controllers\api\UpdateMiscelaneosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/test", function () {
    return response()->json(["message" => "Hello World!"], 200);
});

Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function()
{
    // Route::get('buscar-clientes2', [ConsultasController::class,'BuscarClientes']);
    // // Route::get('logout', [AuthController::class,'logout']);
    // Route::get('cargar', [ConsultasController::class,'CargarDatos']);
    // Route::get('update-consecutivo', [ConsultasController::class,'UpdateConsecutivo']);

    Route::post('update-clientes-entradas', [UpdateController::class,'UpdateClientesEntradas']);
    Route::post('update-equipos', [UpdateController::class,'UpdateEquipos']);
    Route::post('update-fabricantes', [UpdateFabricantesController::class,'UpdateFabricantes']);
    Route::post('update-miscelaneos', [UpdateMiscelaneosController::class,'UpdateMiscelaneos']);
    Route::post('update-ciudades', [UpdateCiudadesController::class,'UpdateCiudades']);


    Route::post('get-entradas', [GetEntradasController::class,'GetEntradas']);
});
