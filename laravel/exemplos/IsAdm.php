<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdm
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
        $access_key = Auth::user()->access_key;

        if ($access_key == 12){
            return $next($request);
        }
        Auth::logout();
        flash('Você não tem a permissão necessaria para acessar a pagina')->error();
        return redirect()->route('login');
    }
}
