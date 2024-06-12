<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//     public function handle(Request $request, Closure $next): Response
//     // {
//     //     if (!empty(Auth::user())) {
//     //         if (url()->current() == route('auth#loginPage') || url()->current() == route('auth#registerPage')) {
//     //             return redirect()->route('auth#loginPage');
//     //         }
//     //         if (Auth::user()->role == 'user') {
//     //             abort('404');
//     //         }
//     //     }
//     //     return $next($request);
//     // }



// }

// public function handle(Request $request, Closure $next)
// {
//     if (Auth::check() && Auth::user()->role === 'admin') {
//         return $next($request);
//     }

//    // return new Response('Access Denied: You are not authorized to access this page.', 403);
//     return redirect()->route('auth#loginPage');
// }

public function handle(Request $request, Closure $next)
{
    if (Auth::check() && Auth::user()->role === 'admin') {
        return $next($request);
    }

    // Exclude login and register pages from redirection
    if ($request->is('loginPage') || $request->is('registerPage')) {
        return $next($request);
    }

    return redirect()->route('auth#loginPage');
}

}
