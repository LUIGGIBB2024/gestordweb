<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Entradadeequipo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetEntradasController extends Controller
{
    public function getEntradas(Request $request)
    {
        //$entradas   = $request->entradas;
        $desde      = $request->desdefecha;
        $hasta      = $request->hastafecha;

        // return response()->json(
        //     [
        //         'status' => '200',
        //         'msg' => 'Actualización Exitosa',
        //         'data' =>  $hasta . " - " . $desde,
        //     ],Response::HTTP_ACCEPTED);

        $consulta = Entradadeequipo::where('fechadereporte','>=',$desde)
                                    ->where('fechadereporte','<=',$hasta)                                  
                                    ->get();   
        return response()->json(
            [
                'status' => '200',
                'msg' => 'Actualización Exitosa',
                'data' =>  $consulta,
            ],Response::HTTP_ACCEPTED);
    }
}
