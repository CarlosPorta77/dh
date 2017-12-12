<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validarEmail(Request $request)
    {
    $usuario = User::where('email',$request->email)->first();

    if ($usuario) {
    $errores = ["validacion" => "existe"];
} else {
    $errores = ["validacion" => "no existe"];
}

        return response()->json($errores);
    }

}
