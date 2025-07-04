<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class QrMenuOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('qr_menu')->user();
        
        // Kullanıcı owner değilse erişimi engelle
        if (!$user || !$user->isOwner()) {
            return redirect()->route('qr-menu.dashboard', $request->route('slug'))
                ->with('error', 'Bu sayfaya erişim yetkiniz yok. Sadece sahipler bu işlemi yapabilir.');
        }
        
        return $next($request);
    }
}
