<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\EntradaDeEquipo;
//use App\Models\Entradadeequipo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetEntradasController extends Controller
{
    public function GetEntradas(Request $request):JsonResponse
    {        
        $desde      = $request->desdefecha;
        $hasta      = $request->hastafecha;

        $consulta = EntradaDeEquipo::where('fechadereporte','>=',$desde)  
              ->where('fechadereporte','<=',$hasta)
              ->where('estado','=',1)
              ->where('estado03','=',1)
              ->get();      

        if  (!isset($consulta))
            {
                return response()->json(
                    [
                        'status' => '404',
                        'msg'  => 'Imposible la Consulta',
                        'data' =>  "Entrada de Equipos no encontrada",
                    ],Response::HTTP_BAD_REQUEST);
            }
        return response()->json(
            [
                'status' => '200',
                'msg' => 'Actualización Exitosa',
                'data' =>  $consulta,
                'request' =>  $request,
                'fechas' =>  $desde . "-" . $hasta,
            ],Response::HTTP_ACCEPTED);
    }
}
