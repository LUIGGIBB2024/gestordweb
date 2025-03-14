<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
//use GuzzleHttp\Psr7\Response;
//use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class AuthController extends Controller
{
    public function login(Request $request):JsonResponse
    {
      //$correo = $request->email ."--" . $request->password;

      return response()->json(
        [
          'status'      => '200 OK',
          'msg'         => 'Voy Aquí',         
        ],Response::HTTP_ACCEPTED);


        $request->validate([
            'email' =>'required',
            'password' =>'required'
         ]);


        if (isset($usuario->id))
         {
            if (Hash::check($request->password,$usuario->password))
               {
                // Creamos TOKEN

                $token = $usuario->createToken("auth_token")->plainTextToken;
                return response()->json(
                 [
                     'status' => '1',
                     'msg' => 'Usuario logueado Exitosamente',
                     'codusuario' => $usuario->codigo,
                     'access_token' =>$token,
                     'data' => $usuario,
                     'request' => $request,
                 ],200);
               }
            else
               {
                return response()->json(
                    [
                     'status' => '0',
                     'msg' => 'Contraseña Inválida',
                     'Password'=>$usuario->password
                    ],404);
               }
         }
         else
         {
           return response()->json(
             [
              'status' => '500',
              'msg' => 'Usuario Inválido'
             ],404);
         }
    }

}
