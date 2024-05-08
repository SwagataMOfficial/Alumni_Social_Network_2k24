<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountValidityChecker {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $user = User::find(session()->get('user_id'))->toArray();
        if ($user['verified_at'] != null && $user['ban_acc'] == 0 && $user['deleted_acc'] == 0) {
            return $next($request);
        }
        else {
            return redirect()->back();
        }
    }
}
