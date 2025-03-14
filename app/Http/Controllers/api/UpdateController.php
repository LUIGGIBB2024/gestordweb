<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\EntradaDeEquipo;
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

        $datos_json = json_decode($request->getContent(), true); 
        
        return response()->json(
          [
              'status' => '200',
              'msg' => 'Actualización Exitosa',
              'data' =>  $request->getContent(),
          ],Response::HTTP_ACCEPTED);     



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

        if (isset($datos_json["entradas"]))
        {
            $entradas = $datos_json["entradas"];
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            foreach ($entradas as $dato)
            {
              $consecutivo  =   $dato['consecutivo'];
              $serial       =   $dato['serial'];
              $fecha        =   $dato['fechadereporte'];
              FacadesDB::beginTransaction();  
              $reg_entradas =   EntradaDeEquipo::updateOrCreate(['serial'=>$serial,'fechadereporte'=>$fecha],
              [
                'consecutivo'           => $dato['consecutivo'],                
                'tipodedocumento'       => $dato['tipodedocumento'],
                'fechadereporte'        => $dato['fechadereporte'],
                'descripcionequipo'     => $dato['descripcionequipo'],
                'observaciones'         => $dato['observaciones'],
                'anticipo'              => $dato['anticipo'],
                'nit'                   => $dato['nit'],
                'nombre'                => $dato['nombre'],
                'direccion'             => $dato['direccion'],
                'telefono'              => $dato['telefono'],              
                'estado'                => $dato['estado'],
                'idcliente'             => $dato['idcliente'],
                'idtecnico'             => $dato['idtecnico'],
                'serial'                => $dato['serial'],
                'modelo'                => $dato['modelo'],
                'estado'                => $dato['estado'],
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
