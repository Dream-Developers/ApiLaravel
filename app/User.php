<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class  User extends Authenticatable
{
   use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','recidencia','telefono', 'email', 'password', "rol_id","foto","sexo","firebase_token"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this
            ->belongsToMany('App\Role')
            ->withTimestamps();
    }
    public function estados()
    {
        return $this
            ->belongsToMany('App\Estados')
            ->withTimestamps();
    }


    public function routeNotificationForFcm() {
        //return a device token, either from the model or from some other place.
        return $this->firebase_token;
    }
}
