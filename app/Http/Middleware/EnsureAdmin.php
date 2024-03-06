<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->Tipe == "Admin") {
            return $next($request);   
        }

        return response()->json([
            "status" => false,
            "tipe" => Auth::user()->Tipe,
            "text" => "Anda bukan admin!"
        ]);
    }
}
