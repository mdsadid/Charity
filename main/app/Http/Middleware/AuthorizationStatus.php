<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizationStatus
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
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->status && $user->ec && $user->sc && $user->tc) {
                return $next($request);
            } else {
                return to_route('user.authorization');
            }
        }

        abort(403);
    }
}
