<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateFabricantesController extends Controller
{
    //
    public function UpdateFabricantes(Request $request):JsonResponse
    {
        $datos_json = json_decode($request->getContent(), true); 
        $datos_json = json_decode($request->fabricantes);     
        return response()->json(
          [
              'status' => '200',
              'msg' => 'Actualización Exitosa',
              'data' =>  $datos_json,
          ],Response::HTTP_ACCEPTED);     
    }
}
