<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle role user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$accepted_role)
    {
        /**
         * Role Middleware
         */
        if (count($accepted_role) > 0 && auth()->check())
        {
            $user_role = auth()->user()->role;
            if (!in_array($user_role, $accepted_role)) {
                return abort(403);
            }
        }

        return $next($request);
    }
}
