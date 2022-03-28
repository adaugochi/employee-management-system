<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = auth()->user();
            if ($user === User::ADMIN) {
                return redirect()->intended(sprintf("/%s/dashboard", $user->user_type));
            } elseif ($user == User::EMPLOYEE) {
                return redirect()->intended(sprintf("/%s/dashboard", $user->user_type));
            }
        }

        return $next($request);
    }
}
