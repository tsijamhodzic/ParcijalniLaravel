<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ($request->isMethod('GET')) {
            return $next($request);
        }

        $secretToken = $role === 'admin' ? 'token123' : 'token456';

        if ($request->query('token') !== $secretToken) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
