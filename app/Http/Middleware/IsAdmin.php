<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type_profil === 'Admin') {
            return $next($request);
        }

        return redirect('/')->with('error', "Vous n'avez pas accès à cette page.");
    }
}
