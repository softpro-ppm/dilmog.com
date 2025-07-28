<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class SuperAdminMiddleware
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
        //  if (Auth::check()) {
        //     if (Auth::user() && Auth::user()->role_id ==1) {
        //         return $next($request);
        //     }
        //         return redirect('/login');
        // }

         // If user is not logged in
    if (!Auth::check()) {
        // For web requests, redirect to superadmin login
        return $request->expectsJson()
            ? response()->json(['error' => 'Unauthenticated.'], 401)
            : redirect('/superadmin/login');
    }

    // If logged in but not a superadmin
    if (Auth::user()->role_id !== 1) {
        return redirect('/login'); // or wherever non-superadmin users should go
    }
    return $next($request);
    }
}
