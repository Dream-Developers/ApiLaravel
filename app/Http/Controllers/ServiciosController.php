<?php

namespace App\Http\Controllers;

use App\Servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function servicio(Request $request)
    {
        $this->validate($request, [

            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
            'Imagen' => 'required|string',

        ]);


        $Servicios = new Servicios([

            'Nombre' => $request->Nombre,
            'Descripcion' => $request->Descripcion,
            'Imagen' => $request->Imagen,

        ]);

        $Servicios->save();
        return response()->json([
            'Exito'], 201);
    }
}
