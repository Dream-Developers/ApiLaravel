<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'max:50',
            'recidencia' => 'max:50',
            'telefono' => 'numeric',
        ]);

        //buscar la instancia en la base de datos
        $user = User::findOrfail($id);
        $user->name = $request->input('name');
        $user->recidencia = $request->input('recidencia');
        $user->telefono = $request->input('telefono');

        $user->save();


        return response()->json(['updated' => true,
            'message' => 'Se actualizarón los datos correctamente'])
            ->header('Content-Type', 'application/json')->header('X-Requested-With', 'XMLHttpRequest');

    }

}
