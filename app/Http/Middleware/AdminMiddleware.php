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
        // Kimlik doğrulama kontrolü
        if (!auth()->check()) {
            // Session'da intended URL'yi sakla
            session(['url.intended' => $request->url()]);
            
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            
            return redirect()->route('admin.login')->with('error', 'Lütfen giriş yapın.');
        }

        $user = auth()->user();
        
        // Admin yetkisi kontrolü
        if (!$user->is_admin) {
            auth()->logout();
            
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden'], 403);
            }
            
            return redirect()->route('admin.login')->with('error', 'Bu sayfaya erişim yetkiniz yok.');
        }

        // Hesap aktiflik kontrolü
        if (!$user->is_active) {
            auth()->logout();
            
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Account disabled'], 403);
            }
            
            return redirect()->route('admin.login')->with('error', 'Hesabınız devre dışı bırakılmıştır.');
        }

        return $next($request);
    }
}
