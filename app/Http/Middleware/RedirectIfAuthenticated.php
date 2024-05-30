<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::user()->hasRole(['admin'])){
                    $redirect_to = '/panel/admin';
                } elseif(Auth::user()->hasRole(['user'])){
                    $redirect_to = '/dashboard';
                } else {
                    $redirect_to = '/unknown_user';
                }
                // Redirect only if the user hasn't already been redirected
                if ($request->path() !== ltrim($redirect_to, '/')) {
                    return redirect($redirect_to);
                }
            }
        }
        // If not authenticated, proceed with the request
        return $next($request);
       
    }
}
