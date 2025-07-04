<?php

namespace App\Http\Controllers\QrMenu;

use App\Http\Controllers\Controller;
use App\Models\QrMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class QrMenuAuthController extends Controller
{
    /**
     * Login sayfasını göster
     */
    public function showLogin($slug)
    {
        $qrMenu = QrMenu::where('url_slug', $slug)
            ->active()
            ->firstOrFail();

        // Zaten giriş yapmışsa dashboard'a yönlendir
        if (Auth::guard('qr_menu')->check()) {
            return redirect()->route('qr-menu.dashboard', $slug);
        }

        return view('qr-menu.auth.login', compact('qrMenu'));
    }

    /**
     * Login işlemi
     */
    public function login(Request $request, $slug)
    {
        $qrMenu = QrMenu::where('url_slug', $slug)
            ->active()
            ->firstOrFail();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Kullanıcıyı bul
        $user = $qrMenu->qrMenuUsers()
            ->where('email', $request->email)
            ->active()
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Girilen bilgiler hatalı.',
            ])->withInput($request->except('password'));
        }

        // Giriş yap
        Auth::guard('qr_menu')->login($user, $request->filled('remember'));

        // Last login zamanını güncelle
        $user->update(['last_login_at' => now()]);

        return redirect()->intended(route('qr-menu.dashboard', $slug));
    }

    /**
     * Logout işlemi
     */
    public function logout(Request $request, $slug)
    {
        Auth::guard('qr_menu')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('qr-menu.login', $slug)
            ->with('success', 'Başarıyla çıkış yaptınız.');
    }
}
