<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request){
        $credenciales = $request->only("email","password");
        try{
            if(! $access_token = JWTAuth::attempt($credenciales)){
                return response()->json([
                    "error"=>"Credenciales Invalidas"
                ]);
            }
            $user = Auth::user();
            return response()->json([
                "token"=>$access_token,
                "USER"=>$user
            ]);
        }catch(JWTException $e){
            return response()->json([
                "error"=>"Credenciales Invalidas"
            ]);
        }
    }
}
