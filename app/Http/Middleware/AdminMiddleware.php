<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            
            return redirect()->route('admin.login')->with('error', 'Bu sayfaya erişim yetkiniz yok.');
        }

        if (!auth()->user()->is_active) {
            auth()->logout();
            return redirect()->route('admin.login')->with('error', 'Hesabınız devre dışı bırakılmıştır.');
        }

        return $next($request);
    }
}
