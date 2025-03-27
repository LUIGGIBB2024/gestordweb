<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateMiscelaneosController extends Controller
{
    //
    public function UpdateMiscelaneos(Request $request):JsonResponse
    {
        return response()->json(
              [
                  'status' => '200',
                  'msg' => 'Actualización Exitosa',
                  'data' =>  $request->fabricantes
              ],Response::HTTP_ACCEPTED);   
            // [
            //     'status' => '405',
            //     'msg'  => 'Imposible la Actualización',
            //     'data' =>  "Apertura Fabricantes OK",
            // ],Response::HTTP_BAD_REQUEST);
    }
}
