<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateTecnicosController extends Controller
{
    public function UpdateTecnicos(Request $request)
    {
        if ($request->tecnicos == null)
        {
            return response()->json(
                [
                    'status' => '405',
                    'msg'  => 'Imposible la Actualización',
                    'data' =>  "Apertura Tecnicos - Sin Datos",
                ]);
        }

        if (isset($request->tecnicos))   
        {
            $tecnicos = ($request->tecnicos);
            foreach ($tecnicos as $dato)
            {
                $codigo = $dato["codigo"];

                $tecnico = Tecnico::updateOrCreate(['codigo'=>$codigo],
                [
                    'nombredeltecnico'      => !is_null($dato['nombre'])?$dato['nombre']:"",
                    'cedula'                => !is_null($dato['cedula'])?$dato['cedula']:"",
                    'telefonodeltecnico'    => !is_null($dato['telefono'])?$dato['telefono']:"",
                    'emaildeltecnico'       => !is_null($dato['emailtec'])?$dato['emailtec']:"",
                    'tipo'                  => $dato["tipo"], 
                    'estado'                => $dato["estado"],
                    'usuario_created'       =>Auth::user()->codigo,
                    'usuario_updated'       =>Auth::user()->codigo
                ]);
            }
        }
 
        return response()->json(
            [
             'status' => '200',
             'msg' => 'Actualización Exitosa - Técnicos',     
             'data' =>  $request->tecnicos       
            ],Response::HTTP_ACCEPTED);
    }
}
