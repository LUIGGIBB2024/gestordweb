<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
//use App\Models\EntradaDeEquipo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateController extends Controller
{
    public function UpdateClientesEntradas(Request $request):JsonResponse
    {

        //$datos_json = json_decode($request->getContent(), true); 
         
        $datos_json = json_decode($request->entradas);     
        // return response()->json(
        //   [
        //       'status' => '200',
        //       'msg' => 'Actualización Exitosa',
        //       'data' =>  $datos_json,
        //   ],Response::HTTP_ACCEPTED);     



        // if (isset($datos_json["clientes"]))
        // {

        //     $clientes   = $datos_json["clientes"];

        //     if ($clientes == null)
        //        {
        //         return response()->json(
        //             [
        //                'status' => '405nnn5eeed',
        //                'msg'  => 'Imposible la Actualización',
        //                'data' =>  "Apertura Clientes OK",
        //               ],404);

        //        }

        //     foreach ($clientes as $dato)
        //     {
        //       $nit          =   $dato['nit'];
        //       $sucursal     =   $dato['sucursal'];
        //       $reg_clientes = cliente::updateOrCreate(['nit'=>$nit,'sucursal'=>$sucursal],
        //       [
        //         'nit'                   => $dato['nit'],
        //         'sucursal'              => $dato['sucursal'],
        //         'dv'                    => $dato['dv'],
        //         'nombredelcliente'      => $dato['nombre'],
        //         'direcciondelcliente'   => $dato['direccion'],
        //         'telefonodelcliente'    => $dato['telefono'],
        //         'emaildelcliente'       => $dato['email'],
        //         'contacto'              => $dato['contacto'],
        //         'telefonocontacto'      => $dato['telefonocontacto'],
        //         'idciudad'              => $dato['idciudad'],
        //         'idcontrato'            => $dato['idcontrato'],
        //         'longitud'              => $dato['longitud'],
        //         'latitud'               => $dato['latitud'],
        //         'estado'                => $dato['estado'],
        //         'usuario_created'       =>Auth::user()->codigo,
        //         'usuario_updated'       =>Auth::user()->codigo
        //       ]);

        //     }
        // }

        //////////////////////////////////////////////////////////////
        /////           Procesar Entradas de Equipos
        //////////////////////////////////////////////////////////////

        if (isset($request->entradas))
        {
          // return response()->json(
          //   [
          //       'status' => '200',
          //       'msg' => 'Actualización Exitosa Entrada',
          //       'data' => $datos_json,
          //   ],Response::HTTP_ACCEPTED); 

            $entradaseq = $datos_json;

            // return response()->json(
            //   [
            //       'status' => '200',
            //       'msg' => 'Actualización Exitosa',
            //       'data' => $entradas,
            //   ],Response::HTTP_ACCEPTED); 

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            // return response()->json(
            //   [
            //       'status' => '200',
            //       'msg' => 'Actualización Exitosa',
            //       'data' => $entradas,
            //   ],Response::HTTP_ACCEPTED); 

            foreach ($entradaseq as $dato)
            {           
                         

              $consecutivo  =   $dato->consecutivo;
              $serial       =   $dato->serial;
              $fecha        =   $dato->fechadereporte;
              FacadesDB::beginTransaction();  
              $reg_entradas =   \App\Models\EntradaDeEquipo::updateOrCreate(['serial'=>$serial,'fechadereporte'=>$fecha],
              [
                'consecutivo'           => $dato->consecutivo,                
                'tipodedocumento'       => "ENTRADA",
                'fechadereporte'        => $dato->fechadereporte,
                'descripcionequipo'     => $dato->descripcionequipo,
                'observaciones'         => $dato->observaciones,
                'reporte'               => $dato->reporte,
                'anticipo'              => $dato->anticipo,
                'nit'                   => $dato->nit,
                'nombre'                => $dato->nombre,
                'direccion'             => $dato->direccion,
                'telefono'              => $dato->telefono,              
                'idcliente'             => $dato->idcliente,
                'idtecnico'             => $dato->idtecnico,
                'rutafirma'             => "",
                'serial'                => $dato->serial,
                'modelo'                => $dato->modelo,
                'estado'                => $dato->estado,
                'estado01'              => 0,
                'estado02'              => 0,
                'estado03'              => 1,
                'usuario_created'       =>Auth::user()->codigo,
                'usuario_updated'       =>Auth::user()->codigo
              ]);
              DB::commit(); 
            }
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');   
        }

  

        //////////////////////////////////////////////////////////////
        /////           Procesar  Detalle de Entradas
        //////////////////////////////////////////////////////////////

        // if (isset($datos_json["detalledeentradas"]))
        // {

        //     $detentradas = $datos_json["detalledeentradas"];

        //     foreach ($detentradas as $dato)
        //     {
        //       $consecutivo  =   $dato['consecutivo'];
        //       $idequipo     =   $dato['idequipo'];
        //       $reg_detentradas =   Detallesdeentrada::updateOrCreate(['consecutivo'=>$consecutivo,'idequipo'=>$idequipo],
        //       [
        //         'consecutivo'           => $dato['consecutivo'],
        //         'idequipo'              => $dato['idequipo'],
        //         'fechadereporte'        => $dato['fechadereporte'],
        //         'problemareportado'     => $dato['problemareportado'],
        //         'idcliente'             => $dato['idcliente'],
        //         'idtecnico'             => $dato['idtecnico'],
        //         'idorden'               => $dato['idorden'],
        //         'identrada'             => $dato['identrada'],
        //         'estado'                => $dato['estado'],
        //         'estado01'              => 0,
        //         'estado02'              => 0,
        //         'estado03'              => 1,
        //         'usuario_created'       =>Auth::user()->codigo,
        //         'usuario_updated'       =>Auth::user()->codigo
        //       ]);
        //     }
        // }

        return response()->json(
            [
                'status' => '200',
                'msg' => 'Actualización Exitosa',
                'data' =>  "Entradas / Clientes OK",
            ],Response::HTTP_ACCEPTED);       

    }
}
