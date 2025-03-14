<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/test", function () {
    return response()->json(["message" => "Hello World!"], 200);
});

Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
