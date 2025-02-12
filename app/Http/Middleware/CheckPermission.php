<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has the required permission
            if (Auth::user()->is_permission == 1) {
                return $next($request);
            }
        }

        // If the user doesn't have the required permission, redirect or respond as needed
        return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
    }
}
