<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class Mostrar_Usuario extends Controller
{
    //

     public function todo() {
        $User=User::all();
        return response()->json($User);
    }
}
