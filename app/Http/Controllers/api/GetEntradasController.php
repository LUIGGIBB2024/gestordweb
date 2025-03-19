<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetEntradasController extends Controller
{
    public function GetEntradas(Request $request):JsonResponse
    {
        $desde      = $request->desdefecha;
        $hasta      = $request->hastafecha;

        $consulta = \App\Models\EntradaDeEquipo::where('fechadereporte','>=',$desde)
                    ->where('fechadereporte','<=',$hasta)                                  
                     ->get();   
        
        //$consulta = \App\Models\EntradaDeEquipo::all();
        return response()->json(
            [
                'status' => '200',
                'msg' => 'Actualización Exitosa',
                'data' =>  $consulta,
            ],Response::HTTP_ACCEPTED);
    }
}
