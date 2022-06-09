<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $id_role)
    {

        if (auth()->check() && auth()->user()->id_role == '1') {
            return $next($request);
        }

        return redirect('/');
    }
}
