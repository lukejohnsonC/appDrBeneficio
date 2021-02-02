<?php

namespace App\Http\Middleware;

use Closure;

class TokenApiRD
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
        if(!$request->has('bearerToken') && $request->bearerToken() !== 'RlPdFWG6yz97WHn4ZGnMhAa2NgwPZtiMKD82yLXWL5EexuynmdM')
        {
                $response = [
                    'status' => 401,
                    'message' => 'Unauthorized'
                ];

                return response()->json($response, 413);
        }
        else
        {
                return $next($request);
        }
    }
}
