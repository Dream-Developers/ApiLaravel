<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    Protected $fillable=[
        'Nombre', 'Direccion','Precio','FechaFumigacion','FechaProxima','Hora','id_usuario'
    ];
    //
}
