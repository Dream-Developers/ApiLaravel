<?php

namespace App\Http\Controllers;
use App\Servicio;
use Illuminate\Http\Request;

class ContenidoController extends Controller{

      public function imagenes(Request $request) 
      {
       $request->validate([
       	'Nombre'      =>'Required|string',
       	'Descripcion' =>'Required|string',
       	'Imagen'      =>'Required|string',
       ]);

       $servicio = new Servicio([
      'Nombre'        =>$request->Nombre,
       	 'Descripcion'   =>$request->Descripcion,
        	'Imagen'        =>$request->Imagen
       ]);
       $servicio->save();
     
       }
}
