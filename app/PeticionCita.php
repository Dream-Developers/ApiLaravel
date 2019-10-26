<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeticionCita extends Model
{
    Protected $fillable=[
        'Nombre', 'Direccion','Precio','FechaFumigacion','Hora'
    ];
}
