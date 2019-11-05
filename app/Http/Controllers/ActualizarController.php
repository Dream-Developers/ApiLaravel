<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ActualizarController extends Controller
{
    //
    public function update(Request $request,$id){

        $validatedData = $request->validate([
            //regex[0-9]
            'name' => 'required|max:50',
            'recidencia' => 'required|max:50',
            'telefono' => 'required|numeric',
            'email' => 'required',
        ]);

        //buscar la instancia en la base de datos
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json([ 'updated' => true,
            'message' => 'Successfully created cita!'], 201);
    }

}
