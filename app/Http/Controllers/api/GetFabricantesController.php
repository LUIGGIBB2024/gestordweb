<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Fabricante;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetFabricantesController extends Controller
{
    public function GetFabricantes():JsonResponse
    {
        $fabricantes = Fabricante::all();
        return response()->json(
            [
               'status' => '200',
               'msg' => 'Actualización Exitosa',
               'fabricantes' =>  $fabricantes,
            ],Response::HTTP_ACCEPTED);
    }
    
}
