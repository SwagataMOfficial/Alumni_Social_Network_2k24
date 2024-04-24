<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is not logged in and trying to access admin pages
        if (!session()->has('Super_admin_logged_in') && $request->path() !== 'admin') {
            return redirect('/admin');
        }

        // Check if the user is already logged in and trying to access the login page
        if (session()->has('Super_admin_logged_in') && $request->path() === 'admin') {
            return redirect('/admin/dashboard');
        }

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');

    }
}
