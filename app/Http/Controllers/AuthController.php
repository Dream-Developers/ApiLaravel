<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        if (($request->foto) == null) {

            if (($request->sexo) == "F") {
                $imagen = "femenino.png";
            } else {
                $imagen = "masculino.png";
            }
            $request->validate([
                'name' => 'required|string',
                'recidencia' => 'required|string',
                'telefono' => 'required|string|max:8',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|confirmed',
                'sexo' => 'required|string',
            ]);
            $user = new User([
                'name' => $request->name,
                'recidencia' => $request->recidencia,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'sexo' => $request->sexo,
                'foto' =>$imagen,
                "rol_id"=>2
            ]);


            $user->save();

            return response()->json([
                'message' => 'Successfully created user!'], 201);
        }else{
            $exploded = explode(',', $request->foto);
            $decode = base64_decode($exploded[0]);
            if (str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';
            $imagen = Carbon::now()->toDateString() ."_".$request->input("name"). '_imagen.' . $extension;
            $path = public_path()."/foto/".$imagen;
            file_put_contents($path, $decode);


            $request->validate([
                'name' => 'required|string',
                'recidencia' => 'required|string',
                'telefono' => 'required|string|max:8',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|confirmed',
                'sexo' => 'required|string',
            ]);
            $user = new User([
                'name' => $request->name,
                'recidencia' => $request->recidencia,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'sexo' => $request->sexo,
                'foto' =>$imagen,
                "rol_id"=>2
            ]);

            $user->save();
            return response()->json([
                'message' => 'Successfully created user!'], 201);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'No existe este usuario'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at)
                ->toDateTimeString(),
            "rol_id"=>$user->rol_id
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' =>
            'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }


}
