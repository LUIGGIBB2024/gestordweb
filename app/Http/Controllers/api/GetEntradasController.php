<?php

namespace App\Http\Controllers\api;


//namespace App\Models;
use App\Http\Controllers\Controller;
use App\Models\Entradadeequipo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetEntradasController extends Controller
{
    public function GetEntradas(Request $request):JsonResponse
    {
        $desde      = $request->desdefecha;
        $hasta      = $request->hastafecha;

        return response()->json(
            [
                'status' => '200 ENT',
                'msg' => 'Actualización Exitosa',
                //'data' =>  $consulta,
            ],Response::HTTP_ACCEPTED);

        $consulta = \App\Models\EntradaDeEquipo::all(); 

        // $consulta = \App\Models\EntradaDeEquipo::where('fechadereporte','>=',$desde)  
        // //$consulta = Entradadeequipo::where('fechadereporte','>=',$desde)
        //             ->where('fechadereporte','<=',$hasta)                                  
        //              ->get();   

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
            ],Response::HTTP_ACCEPTED);
    }
}
