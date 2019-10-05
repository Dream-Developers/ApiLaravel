<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    Protected $fillable=[
        'nombre', 'descripcion','imagen'
    ];//
}
