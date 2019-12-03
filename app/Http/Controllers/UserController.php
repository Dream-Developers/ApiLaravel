<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function update(Request $request)
    {
        if (($request->foto) == null) {

            $this->validate($request, [
                'name' => 'required|string',
                'recidencia' => 'required|string',
                'telefono' => 'required|string|max:8',
            ]);
            $exploded = explode(',', $request->foto);
            $decode = base64_decode($exploded[0]);
            if (str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
                $extension = 'png';
            $imagen = str_random() . '.' . $extension;
            $path = public_path() . "/foto/" . $imagen;
            file_put_contents($path, $decode);

            //buscar la instancia en la base de datos
            $user = User::findOrfail($request->id);
            $user->name = $request->input('name');
            $user->recidencia = $request->input('recidencia');
            $user->telefono = $request->input('telefono');
            $user->save();


            return response()->json(['updated' => true,
                'message' => 'Se actualizarón los datos correctamente'])
                ->header('Content-Type', 'application/json')->header('X-Requested-With', 'XMLHttpRequest');

        } else{
            $this->validate($request, [
                'name' => 'required|string',
                'recidencia' => 'required|string',
                'telefono' => 'required|string|max:8',
            ]);
            $exploded = explode(',', $request->foto);
            $decode = base64_decode($exploded[0]);
            if (str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
                $extension = 'png';
            $imagen = str_random() . '.' . $extension;
            $path = public_path() . "/foto/" . $imagen;
            file_put_contents($path, $decode);

            $user = User::findOrfail($request->id);
            $user->name = $request->input('name');
            $user->recidencia = $request->input('recidencia');
            $user->telefono = $request->input('telefono');
            $user->foto = $imagen;
            $user->save();


            return response()->json(['updated' => true,
                'message' => 'Se actualizarón los datos correctamente'])
                ->header('Content-Type', 'application/json')->header('X-Requested-With', 'XMLHttpRequest');
        }

    }



    public function actualizarTokenFirebase(Request $request){
        $user = User::findOrFail($request->id);
        $user->firebase_token= $request->firebase_token;
        $user->save();


        return response()->json(['updated' => true,
            'message' => 'Se actualizarón los datos correctamente'])
            ->header('Content-Type', 'application/json')->header('X-Requested-With', 'XMLHttpRequest');


    }

}
