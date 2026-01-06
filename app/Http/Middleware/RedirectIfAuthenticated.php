<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $this->redirectToRoleDashboard(Auth::user());
            }
        }

        return $next($request);
    }

    protected function redirectToRoleDashboard($user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('seller')) {
            return redirect()->route('seller.dashboard');
        }

        if ($user->hasRole('customer')) {
            return redirect()->route('customer.dashboard');
        }

        // Fallback to home if no role matches
        return redirect()->route('home');
    }
}
