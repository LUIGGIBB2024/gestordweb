<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Miscelaneo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetMiscelaneosController extends Controller
{
    public function GetMiscelaneos(Request $request)
    {
        $miscelaneos = Miscelaneo::all();
        return response()->json([
            'status' => '200',
            'msg' => 'Actualización Exitosa',
            'miscelaneos' => $miscelaneos,
        ],Response::HTTP_ACCEPTED);
    }
}
