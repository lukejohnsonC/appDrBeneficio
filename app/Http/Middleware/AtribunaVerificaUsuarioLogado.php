<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AtribunaVerificaUsuarioLogado
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
        if(!Session::get('admin_id')) {
            Session::flush();
            return redirect()->route('cartaotribuna.login')->with('message','Você não está logado');
        }

        return $next($request);
    }
}
