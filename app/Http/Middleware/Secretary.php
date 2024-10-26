<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Secretary
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (auth()->check()) {
        if (auth()->user()->user_type == 'secretary') {
            return $next($request);
        }else{
            return redirect()->route('dashboard');
        }
       }else{
        return redirect()->route('login');
       }
    }
}
