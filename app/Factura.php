<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    Protected $fillable=[

        'Nombre','Detalle','Fecha','Total'
    ];
    //
}
