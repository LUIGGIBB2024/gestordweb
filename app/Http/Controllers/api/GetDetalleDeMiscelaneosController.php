<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Detalledemiscelaneo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetDetalleDeMiscelaneosController extends Controller
{
    public function GetDetalleDeMiscelaneos()
    {
        $detalledemiscelaneos = Detalledemiscelaneo::all();
        return response()->json([
            'status' => '200',
            'msg' => 'Actualización Exitosa',
            'miscelaneos' => $detalledemiscelaneos,
        ],Response::HTTP_ACCEPTED);        
       
    }
}
