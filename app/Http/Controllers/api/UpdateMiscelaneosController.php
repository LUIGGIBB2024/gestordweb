<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Detalledemiscelaneo;
use App\Models\Miscelaneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateMiscelaneosController extends Controller
{
    //
    public function UpdateMiscelaneos(Request $request):JsonResponse
    {        
        if ($request->miscelaneos == null)
           {
             return response()->json(
               [
                 'status' => '405',
                 'msg'  => 'Imposible la Actualización',
                 'data' =>  "Apertura Miscelaneos - Sin Datos",
                 ],Response::HTTP_BAD_REQUEST);
           }

        
        if (isset($request->miscelaneos))   
          {
              $miscelaneos = ($request->miscelaneos);
              foreach ($miscelaneos as $dato)
              {
                $codigo = $dato["codigo"];

                $miscelaneo = Miscelaneo::updateOrCreate(['codigo'=>$codigo],
                [
                  'descripcion'           => $dato["descripcion"],
                  'estado'                => $dato["estado"],
                  'usuario_created'       =>Auth::user()->codigo,
                  'usuario_updated'       =>Auth::user()->codigo
                ]);
              }
          } 
          
          if (isset($request->detalledemiscelaneos))   
          {
              $detalledemiscelaneos = ($request->detalledemiscelaneos);
              foreach ($detalledemiscelaneos as $dato)
              {
                $codigo       = $dato["codigo"];
                $idmiscelaneo = $dato["idmiscelaneo"];

                $miscelaneo = Detalledemiscelaneo::updateOrCreate(['codigo'=>$codigo, 'idmiscelaneo'=>$idmiscelaneo],
                [
                  'descripcion'           => $dato["descripcion"],
                  'estado'                => $dato["estado"],
                  'usuario_created'       =>Auth::user()->codigo,
                  'usuario_updated'       =>Auth::user()->codigo
                ]);
              }
          } 

          return response()->json(
             [
              'status' => '200',
              'msg' => 'Actualización Exitosa - Miscelaneos',     
              'data' =>  $miscelaneos        
             ],Response::HTTP_ACCEPTED);
         
    }
}
