<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user()->id;
        $role = User::find($user)->userRole()->first();
        if (auth::check() && $role->name == "admin") {
            return $next($request);
        } else {
            return response()->json([
                'message' => 'Not have access!!!'
            ], 404);
        }
    }
}
