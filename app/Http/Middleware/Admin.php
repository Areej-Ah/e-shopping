<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next = null,$guard = null): Response
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
           // return redirect(RouteServiceProvider::ADMIN);
        }
        else
        {
            return redirect('admin/login');
        }

    }
}
