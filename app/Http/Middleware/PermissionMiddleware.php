<?php

namespace App\Http\Middleware;

use Closure, App\User, Auth;

class PermissionMiddleware
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
        $user = Auth::user();
        if($user->is('corretor')){
          return redirect("relatorios/corretores/$user->id");
        }
        return $next($request);
    }
}
