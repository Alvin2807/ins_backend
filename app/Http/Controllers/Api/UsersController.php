<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Requests\Login\StoreRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
    public function store(StoreRequest $request)
    {
        //Registrar usuarios
       try {
        DB::beginTransaction();
        $user = new User();
        $user->name     = ucwords($request->input('name'));
        $user->usuario  = strtoupper($request->input('usuario'));
        $user->email    = strtolower($request->input('email'));
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;
        $cookie = cookie('token', $token, 60 * 24); // 1 day
        
        DB::commit();
        return response()->json([
            'data' => new UserResource($user),
            "ok"   =>true,
            "exitoso" =>'Se guardo satisfactoriamente'
        ])->withCookie($cookie);
       } catch (\Exception $error) {
        DB::rollBack();
        return response()->json([
            "ok" =>false,
            "data" =>$error->getMessage(),
            "error" =>'Hubo un error consulte con el Administrador del sistema'
        ]);
       }
          

    }

    /**
     * Display the specified resource.
     */
    public function loginIniciar(LoginRequest $request)
    {
        //Iniciar session
        $data = $request->validated();

        $user = User::where('usuario', $data['usuario'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Usuario o contraseña incorrecta'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $cookie = cookie('token', $token, 60 * 24); // 1 day

        return response()->json([
            'user' => new UserResource($user),
            'token' =>$token
        ])->withCookie($cookie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        $cookie = cookie()->forget('token');

        return response()->json([
            'message' => 'Logged out successfully!'
        ])->withCookie($cookie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
