<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->server('PATH_INFO');
        $arr = explode('/', $path);
        if (in_array($arr[2], ['general', 'account', 'security-and-privacy', 'social-links', 'change-password', 'notifications'])) {
            return $next($request);
        }
        else {
            return redirect('/');
        }
    }
}
