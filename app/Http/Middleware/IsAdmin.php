<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (Auth::user()->id == 1 || Auth::user()->id == 2 || Auth::user()->id == 3)) {
            return $next($request);
        }
        
        abort(403, 'Vous n\'avez pas l\'autorisation d\'entrer à cette page');
    }

}
