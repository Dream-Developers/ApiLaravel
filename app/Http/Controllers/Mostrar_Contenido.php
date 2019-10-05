<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\servicio;
class Mostrar_Contenido extends Controller
{
        public function todo() {
       $servicios = servicio::all();
        return response()->json($servicios);
    }
    
}
