<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeticionCita extends Model
{
    Protected $fillable=[
        'Nombre', 'Direccion','Telefono','FechaFumigacion','Hora'
    ];
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
    public function estados()
    {
        return $this
            ->belongsToMany('App\Estado')
            ->withTimestamps();
    }
}
