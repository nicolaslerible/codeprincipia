<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //Información del usuario registrado
        $user = Auth::user();
        //Si $user es admin el usuario permanece en la página
        if ($user->esAdmin()){
            return $response;
        }
        //Si no lo es se le redirecciona al inicio
        return redirect('/');
        
    }
}
