<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function servicio(Request $request)
    {

            /*$file = $request->file('imagen');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/imagenes/',$name);*/


            $file = $request->all();
            if ($archivo = $request ->file('imagen')) {
                $nombre = $archivo->getClientOriginalName();
                $archivo->move(public_path() . '/imagen/', $nombre);
            $entrada['imagen']=$nombre;
            }
            Servicio::create($file);

            }
//Jennifer
    public function Recuperar(){
        $servicios = Servicio::all();
        return response()->json($servicios);

    }

//
        /*$this->validate($request, [

            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'required',

        ]);



        $Servicios = new Servicio([

            'nombre' => $request->Nombre,
            'descripcion' => $request->Descripcion,
             $request->Imagen = $name,

        ]);

        $Servicios->save();
        return response()->json([
            'Exito'], 201);
    }*/
}
