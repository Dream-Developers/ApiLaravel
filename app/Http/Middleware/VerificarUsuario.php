<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class VerificarUsuario extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected function authenticate( array $guards)
    {
        if (empty($guards)) {
            return $this->auth->authenticate();
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        throw new AuthenticationException('No Autorizado', $guards);
    }
    protected function redirectTo($request)
    {
        if($request->wantsJson()){
            return response()->json(["mensaje"=>"Debes iniciar sesion "]);
        }
        if($request->expectsJson()){
            return response()->json(["mensaje"=>"Debes iniciar sesion "]);
        }
        return route('login');
    }

}
