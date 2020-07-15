<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AutorizacionMiddleware
{

   public function handle($request, Closure $next, string $permiso)
    {
        $user = Auth::user();//obtenemos el usuario autentificado
        if ($user->can($permiso)) {// verifico si el usuario tiene permiso
            return $next($request);//aqui le dice continua la peticion
        }else{
            abort(403, 'Acción no autorizada, no jodas pelotubis');
        }
    }
}


