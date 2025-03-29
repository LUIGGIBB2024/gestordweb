<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetClientesController extends Controller
{
    public function GetClientes(): JsonResponse
    {
        $clientes = Cliente::all();

        return response()->json([
            'status' => '200',
            'msg' => 'Actualización Exitosa',
            'miscelaneos' => $clientes,
        ],Response::HTTP_ACCEPTED);
    }
}
