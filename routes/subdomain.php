<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrMenu\{
    QrMenuController,
    QrMenuAuthController,
    QrMenuManagerController
};

/*
|--------------------------------------------------------------------------
| Subdomain QR Menu Routes
|--------------------------------------------------------------------------
|
| QR Menü sistemi için subdomain route'ları. 
| Format: {slug}.hatayimar.com.tr
|
*/

// Subdomain QR Menü routes
Route::domain('{slug}.hatayimar.com.tr')->group(function () {
    
    // Ana sayfa - QR Menü görüntüleme (herkese açık)
    Route::get('/', [QrMenuController::class, 'show'])
        ->name('qr-menu.subdomain.show');

    // QR Menü yönetim girişi
    Route::get('/yonetici', [QrMenuAuthController::class, 'showLogin'])
        ->name('qr-menu.subdomain.login');

    Route::post('/yonetici', [QrMenuAuthController::class, 'login'])
        ->name('qr-menu.subdomain.login.submit');

    // QR Menü yönetim paneli (authentication gerekli)
    Route::middleware(['qr-menu-auth'])->group(function () {
        
        // Dashboard
        Route::get('/yonetici/dashboard', [QrMenuManagerController::class, 'dashboard'])
            ->name('qr-menu.subdomain.dashboard');
        
        // Logout
        Route::post('/yonetici/logout', [QrMenuAuthController::class, 'logout'])
            ->name('qr-menu.subdomain.logout');
        
        // Menü ayarları
        Route::get('/yonetici/ayarlar', [QrMenuManagerController::class, 'settings'])
            ->name('qr-menu.subdomain.settings');
        
        Route::put('/yonetici/ayarlar', [QrMenuManagerController::class, 'updateSettings'])
            ->name('qr-menu.subdomain.settings.update');
        
        // Kategoriler
        Route::get('/yonetici/kategoriler', [QrMenuManagerController::class, 'categories'])
            ->name('qr-menu.subdomain.categories');
        
        Route::post('/yonetici/kategoriler', [QrMenuManagerController::class, 'storeCategory'])
            ->name('qr-menu.subdomain.categories.store');
        
        Route::get('/yonetici/kategoriler/{category}', [QrMenuManagerController::class, 'getCategory'])
            ->name('qr-menu.subdomain.categories.get');
        
        Route::put('/yonetici/kategoriler/{category}', [QrMenuManagerController::class, 'updateCategory'])
            ->name('qr-menu.subdomain.categories.update');
        
        Route::delete('/yonetici/kategoriler/{category}', [QrMenuManagerController::class, 'destroyCategory'])
            ->name('qr-menu.subdomain.categories.destroy');
        
        // Menü öğeleri
        Route::get('/yonetici/urunler', [QrMenuManagerController::class, 'items'])
            ->name('qr-menu.subdomain.items');
        
        Route::post('/yonetici/urunler', [QrMenuManagerController::class, 'storeItem'])
            ->name('qr-menu.subdomain.items.store');
        
        Route::get('/yonetici/urunler/{item}', [QrMenuManagerController::class, 'getItem'])
            ->name('qr-menu.subdomain.items.get');
        
        Route::put('/yonetici/urunler/{item}', [QrMenuManagerController::class, 'updateItem'])
            ->name('qr-menu.subdomain.items.update');
        
        Route::delete('/yonetici/urunler/{item}', [QrMenuManagerController::class, 'destroyItem'])
            ->name('qr-menu.subdomain.items.destroy');
        
        // Ürün durumu toggle
        Route::patch('/yonetici/urunler/{item}/durum', [QrMenuManagerController::class, 'toggleItemStatus'])
            ->name('qr-menu.subdomain.items.toggle-status');
        
        // QR kod yeniden oluştur
        Route::post('/yonetici/qr-kod-olustur', [QrMenuManagerController::class, 'regenerateQrCode'])
            ->name('qr-menu.subdomain.regenerate-qr');
        
        // QR kod indir
        Route::get('/yonetici/qr-kod-indir', [QrMenuManagerController::class, 'downloadQrCode'])
            ->name('qr-menu.subdomain.download-qr');
        
        // Kullanıcı yönetimi (sadece owner)
        Route::middleware(['qr-menu-owner'])->group(function () {
            Route::get('/yonetici/kullanicilar', [QrMenuManagerController::class, 'users'])
                ->name('qr-menu.subdomain.users');
            
            Route::post('/yonetici/kullanicilar', [QrMenuManagerController::class, 'storeUser'])
                ->name('qr-menu.subdomain.users.store');
            
            Route::get('/yonetici/kullanicilar/{user}', [QrMenuManagerController::class, 'getUser'])
                ->name('qr-menu.subdomain.users.get');
            
            Route::put('/yonetici/kullanicilar/{user}', [QrMenuManagerController::class, 'updateUser'])
                ->name('qr-menu.subdomain.users.update');
            
            Route::delete('/yonetici/kullanicilar/{user}', [QrMenuManagerController::class, 'destroyUser'])
                ->name('qr-menu.subdomain.users.destroy');
        });
    });
});

// Lokalde test için
if (app()->environment('local')) {
    Route::domain('{slug}.localhost')->group(function () {
        
        // Ana sayfa - QR Menü görüntüleme (herkese açık)
        Route::get('/', [QrMenuController::class, 'show'])
            ->name('qr-menu.local.show');

        // QR Menü yönetim girişi
        Route::get('/yonetici', [QrMenuAuthController::class, 'showLogin'])
            ->name('qr-menu.local.login');

        Route::post('/yonetici', [QrMenuAuthController::class, 'login'])
            ->name('qr-menu.local.login.submit');

        // QR Menü yönetim paneli (authentication gerekli)
        Route::middleware(['qr-menu-auth'])->group(function () {
            Route::get('/yonetici/dashboard', [QrMenuManagerController::class, 'dashboard'])
                ->name('qr-menu.local.dashboard');
            Route::post('/yonetici/logout', [QrMenuAuthController::class, 'logout'])
                ->name('qr-menu.local.logout');
            Route::get('/yonetici/ayarlar', [QrMenuManagerController::class, 'settings'])
                ->name('qr-menu.local.settings');
            Route::put('/yonetici/ayarlar', [QrMenuManagerController::class, 'updateSettings'])
                ->name('qr-menu.local.settings.update');
            Route::get('/yonetici/kategoriler', [QrMenuManagerController::class, 'categories'])
                ->name('qr-menu.local.categories');
            Route::post('/yonetici/kategoriler', [QrMenuManagerController::class, 'storeCategory'])
                ->name('qr-menu.local.categories.store');
            Route::put('/yonetici/kategoriler/{category}', [QrMenuManagerController::class, 'updateCategory'])
                ->name('qr-menu.local.categories.update');
            Route::delete('/yonetici/kategoriler/{category}', [QrMenuManagerController::class, 'destroyCategory'])
                ->name('qr-menu.local.categories.destroy');
            Route::get('/yonetici/urunler', [QrMenuManagerController::class, 'items'])
                ->name('qr-menu.local.items');
            Route::post('/yonetici/urunler', [QrMenuManagerController::class, 'storeItem'])
                ->name('qr-menu.local.items.store');
            Route::get('/yonetici/urunler/{item}', [QrMenuManagerController::class, 'getItem'])
                ->name('qr-menu.local.items.get');
            Route::put('/yonetici/urunler/{item}', [QrMenuManagerController::class, 'updateItem'])
                ->name('qr-menu.local.items.update');
            Route::delete('/yonetici/urunler/{item}', [QrMenuManagerController::class, 'destroyItem'])
                ->name('qr-menu.local.items.destroy');
            Route::patch('/yonetici/urunler/{item}/durum', [QrMenuManagerController::class, 'toggleItemStatus'])
                ->name('qr-menu.local.items.toggle-status');
            Route::post('/yonetici/qr-kod-olustur', [QrMenuManagerController::class, 'regenerateQrCode'])
                ->name('qr-menu.local.regenerate-qr');
            Route::get('/yonetici/qr-kod-indir', [QrMenuManagerController::class, 'downloadQrCode'])
                ->name('qr-menu.local.download-qr');
            
            // Kullanıcı yönetimi (sadece owner)
            Route::middleware(['qr-menu-owner'])->group(function () {
                Route::get('/yonetici/kullanicilar', [QrMenuManagerController::class, 'users'])
                    ->name('qr-menu.local.users');
                Route::post('/yonetici/kullanicilar', [QrMenuManagerController::class, 'storeUser'])
                    ->name('qr-menu.local.users.store');
                Route::get('/yonetici/kullanicilar/{user}', [QrMenuManagerController::class, 'getUser'])
                    ->name('qr-menu.local.users.get');
                Route::put('/yonetici/kullanicilar/{user}', [QrMenuManagerController::class, 'updateUser'])
                    ->name('qr-menu.local.users.update');
                Route::delete('/yonetici/kullanicilar/{user}', [QrMenuManagerController::class, 'destroyUser'])
                    ->name('qr-menu.local.users.destroy');
            });
        });
    });
} 