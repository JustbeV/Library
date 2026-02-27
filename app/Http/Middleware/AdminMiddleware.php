<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Not logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Logged in but NOT admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        // Is admin → allow access
        return $next($request);
    }
}

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class AdminMiddleware
// {
//     /**
//      * Handle an incoming request.
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         // Not logged in
//         if (!auth()->check()) {
//             return redirect()->route('login');
//         }

//         // Logged in but NOT admin
//         if (!auth()->user()->is_admin) {
//             abort(403, 'Unauthorized access.');
//         }

//         // Is admin → allow access
//         return $next($request);
//     }
// }

