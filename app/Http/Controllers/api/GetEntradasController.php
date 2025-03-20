<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Models\Entradadeequipo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetEntradasController extends Controller
{
    public function GetEntradas(Request $request):JsonResponse
    {

        $datos_json = json_decode($request);
        $desde      = $datos_json->desdefecha;
        $hasta      = $datos_json->hastafecha;

        return response()->json(
             [
                 'status' => '200 ENT',
                 'msg' => 'Actualización Exitosa',
                 //'data' =>  $desde . "-" . $hasta,
                 'data' =>$datos_json,
             ],Response::HTTP_ACCEPTED);

        $consulta = EntradaDeEquipo::all(); 

        $consulta = EntradaDeEquipo::where('fechadereporte','>=',$desde)  
              ->where('fechadereporte','<=',$hasta)->get();   
        //$consulta = Entradadeequipo::where('fechadereporte','>=',$desde)
                  

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
