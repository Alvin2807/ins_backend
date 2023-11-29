<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use App\Http\Requests\Login\LoginRequest;
use App\Models\VistaUsuarios;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function login(LoginRequest $request, Login $login)
    {
        //Acceder al sistema
        $usuario = strtoupper($request->input('usuario'));
        $contrasena = strtolower($request->input('password'));
        $login = Login::
        select('usuario','password')->
        where('usuario', $usuario)->
        get();

     
        if ($login->count()) {
            if (password_verify($contrasena, $login[0]['password'])) {
                return response ()->json([
                    "ok"  => true,
                    "aprobado"    => 'Ha ingresado existosamente',
                    "data" => $login[0],
                ]);
            } else  {
                return response ()->json([
                    "ok"  => false,
                    "errorUsuario"    => 'Usuario o contraseña incorrecta.'
                ]);
            }
        } else { 
            return response ()->json([
                "ok"  => false,
                "errorUsuario"    => 'Usuario o contraseña incorrecta'
            ]);
        } 
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
