<?php

namespace App\Http\Middleware;

use Closure;

class checkRole
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
        $user = request()->user();
        foreach ($user->roles as $role) {
            if ($role->role !== 'Администратор') {
                return response()->json(['error' => 'Вход только для администратора.'],403);
            }
        }
       return $next($request);
    }
}
