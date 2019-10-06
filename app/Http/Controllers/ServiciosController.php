<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function servicio(Request $request)
    {
        $this->validate($request, [

            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'required|string',

        ]);


        $Servicios = new Servicio([

            'nombre' => $request->Nombre,
            'descripcion' => $request->Descripcion,
            'imagen' => $request->Imagen,

        ]);

        $Servicios->save();
        return response()->json([
            'Exito'], 201);
    }
}
