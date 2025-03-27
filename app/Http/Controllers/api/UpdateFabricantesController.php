<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Fabricante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateFabricantesController extends Controller
{
    //
    public function UpdateFabricantes(Request $request):JsonResponse
    {
        //$datos_json = json_decode($request->getContent(), true); 
        //$datos_json = json_decode($request->fabricantes);     
        return response()->json(
          [
              'status' => '200',
              'msg' => 'Actualización Exitosa',
              'data' =>  $request->fabricantes
          ],Response::HTTP_ACCEPTED);   

        if ($request->fabricantes == null)
        {
            return response()->json(
                [
                    'status' => '405',
                    'msg'  => 'Imposible la Actualización',
                    'data' =>  "Apertura Fabricantes OK",
                ],Response::HTTP_BAD_REQUEST);
        }

        $fabricantes = ($request->fabricantes);
        foreach ($fabricantes as $dato)
        {
            $codigo = $dato->codigo;
            $fabricante = Fabricante::updateOrCreate(['codigo'=>$codigo],
            [
                'descripcion'           => $dato->descripcion,
                'estado'                => $dato->estado,
                'usuario_created'       =>Auth::user()->codigo,
                'usuario_updated'       =>Auth::user()->codigo
              
            ]);
        }  
    }
}
