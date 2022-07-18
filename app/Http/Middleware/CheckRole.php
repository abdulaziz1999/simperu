<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
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
    public function handle(Request $request, Closure $next, ...$roles)
    {

        foreach ($roles as $r) {
            // if ($request->user()->hasRole($r)) {
            $user = isset(Auth::user()->role) ? Auth::user()->role : '';
            if ($user == $r) {
                return $next($request);
            }
        }

        // return redirect()->route('login');
        // foreach ($roles as $role) {
        //     if ($user == $role) {
        //         return $next($request);
        //     }
        // }

        // return redirect('/');
        return redirect('/login');
    }
}
