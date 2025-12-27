<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect('/')->with('showLogin', true)->with('error', 'Silakan login terlebih dahulu.');
        }

        // If no roles specified, allow all authenticated users
        if (empty($roles)) {
            return $next($request);
        }

        $user = auth()->user();
        $userRole = $user->role ?? null;

        // Check if user has one of the required roles
        if (!in_array($userRole, $roles)) {
            return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
