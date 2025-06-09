<?php

namespace App\Http\Middleware\auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\support\Facades\Auth;

class CheckSystemUserLogoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $guard, string $userType): Response
    {
        // hint: Check if the user is not authenticated
        if (!Auth::guard($guard)->check()) {
            return redirect()->route($userType . '.login.show');
        }
        return $next($request);
    }
}
