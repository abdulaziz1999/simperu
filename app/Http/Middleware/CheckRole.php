<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // return $next($request);
        $roles = array_slice(func_get_args(), 2);
        // return dd($roles);

        foreach ($roles as $role) {
            $user = isset(\Auth::user()->role) ? \Auth::user()->role : '';
            if ($user == $role) {
                return $next($request);
            }
        }

        return redirect('/login');
    }
}
