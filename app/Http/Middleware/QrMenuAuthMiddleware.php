<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QrMenu;
use Symfony\Component\HttpFoundation\Response;

class QrMenuAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');
        
        // QR menüyü bul
        $qrMenu = QrMenu::where('url_slug', $slug)->first();
        
        if (!$qrMenu) {
            return redirect()->route('home')->with('error', 'QR Menü bulunamadı.');
        }
        
        // QR menü kullanıcısı olarak giriş yapmış mı kontrol et
        if (!Auth::guard('qr_menu')->check()) {
            return redirect()->route('qr-menu.login', $slug)
                ->with('error', 'Bu sayfaya erişmek için giriş yapmalısınız.');
        }
        
        $user = Auth::guard('qr_menu')->user();
        
        // Kullanıcı bu QR menüye ait mi?
        if ($user->qr_menu_id !== $qrMenu->id) {
            Auth::guard('qr_menu')->logout();
            return redirect()->route('qr-menu.login', $slug)
                ->with('error', 'Bu menüye erişim yetkiniz yok.');
        }
        
        // Kullanıcı aktif mi?
        if (!$user->is_active) {
            Auth::guard('qr_menu')->logout();
            return redirect()->route('qr-menu.login', $slug)
                ->with('error', 'Hesabınız devre dışı bırakılmıştır.');
        }
        
        // Request'e qrMenu ve user bilgilerini ekle
        $request->merge([
            'qr_menu' => $qrMenu,
            'qr_menu_user' => $user
        ]);
        
        return $next($request);
    }
}
