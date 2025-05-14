<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetCiudadesController extends Controller
{
    public function GetCiudades(): JsonResponse
    {
        $a = 0;
        $ciudades = Ciudad::all();

        return response()->json([
            'status' => '200',
            'msg' => 'Consulta Exitosa',
            'ciudades' => $ciudades,
        ], Response::HTTP_ACCEPTED);
    }
}
