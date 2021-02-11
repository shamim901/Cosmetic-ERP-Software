<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/login');
        }

        if ($request->wantsJson() && auth()->guard('api')->user()) {
            return response([
                'error' => [
                    'message'     => 'Not allowed',
                    'status_code' => 403,
                ],
            ], 403);
        }

        return $next($request);
    }
}