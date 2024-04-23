<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) {
        $path = $request->server('PATH_INFO');
        $arr = explode('/', $path);
        if (in_array($arr[2], ['home', 'posts', 'images', 'jobs'])) {
            return $next($request);
        }
        else {
            return redirect('/');
        }
    }
}
