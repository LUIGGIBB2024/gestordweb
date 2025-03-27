<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateCiudadesController extends Controller
{
     public function UpdateCiudades(Request $request):JsonResponse
    { 
        if ($request->ciudades == null)
        {
            return response()->json(
                [
                    'status' => '405',
                    'msg'  => 'Imposible la Actualización',
                    'data' =>  "Apertura Ciudades - Sin Datos",
                ],Response::HTTP_BAD_REQUEST);
        }

        if (isset($request->ciudades))   
        {
            $ciudades = ($request->ciudades);
            foreach ($ciudades as $dato)
            {
                $codigo = $dato["codigo"];

                $ciudad = Ciudad::updateOrCreate(['codigo'=>$codigo],
                [
                    'descripcion'           => $dato["descripcion"],
                    'codigodane'            => $dato["codigodane"],
                    'estado'                => $dato["estado"],
                    'usuario_created'       =>Auth::user()->codigo,
                    'usuario_updated'       =>Auth::user()->codigo
                ]);
            }
        } 
        return response()->json(
            [
                'status' => '200',
                'msg' => 'Actualización Exitosa - Ciudades',     
                'data' =>  $request->ciudades        
            ],Response::HTTP_ACCEPTED);
    }
}
