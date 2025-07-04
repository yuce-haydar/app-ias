<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrMenu\{
    QrMenuController,
    QrMenuAuthController,
    QrMenuManagerController
};

/*
|--------------------------------------------------------------------------
| QR Menu Routes
|--------------------------------------------------------------------------
|
| QR Menü sistemi için route'lar. Her tesis için ayrı QR menü sistemi.
|
*/

// QR Menü görüntüleme (herkese açık)
Route::get('/qr-menu/{slug}', [QrMenuController::class, 'show'])
    ->name('qr-menu.show');

// QR Menü yönetim girişi
Route::get('/qr-menu/{slug}/yonetici', [QrMenuAuthController::class, 'showLogin'])
    ->name('qr-menu.login');

Route::post('/qr-menu/{slug}/yonetici', [QrMenuAuthController::class, 'login'])
    ->name('qr-menu.login.submit');

// QR Menü yönetim paneli (authentication gerekli)
Route::middleware(['qr-menu-auth'])->group(function () {
    
    // Dashboard
    Route::get('/qr-menu/{slug}/yonetici/dashboard', [QrMenuManagerController::class, 'dashboard'])
        ->name('qr-menu.dashboard');
    
    // Logout
    Route::post('/qr-menu/{slug}/yonetici/logout', [QrMenuAuthController::class, 'logout'])
        ->name('qr-menu.logout');
    
    // Menü ayarları
    Route::get('/qr-menu/{slug}/yonetici/ayarlar', [QrMenuManagerController::class, 'settings'])
        ->name('qr-menu.settings');
    
    Route::put('/qr-menu/{slug}/yonetici/ayarlar', [QrMenuManagerController::class, 'updateSettings'])
        ->name('qr-menu.settings.update');
    
    // Kategoriler
    Route::get('/qr-menu/{slug}/yonetici/kategoriler', [QrMenuManagerController::class, 'categories'])
        ->name('qr-menu.categories');
    
    Route::post('/qr-menu/{slug}/yonetici/kategoriler', [QrMenuManagerController::class, 'storeCategory'])
        ->name('qr-menu.categories.store');
    
    Route::put('/qr-menu/{slug}/yonetici/kategoriler/{category}', [QrMenuManagerController::class, 'updateCategory'])
        ->name('qr-menu.categories.update');
    
    Route::delete('/qr-menu/{slug}/yonetici/kategoriler/{category}', [QrMenuManagerController::class, 'destroyCategory'])
        ->name('qr-menu.categories.destroy');
    
    // Menü öğeleri
    Route::get('/qr-menu/{slug}/yonetici/urunler', [QrMenuManagerController::class, 'items'])
        ->name('qr-menu.items');
    
    Route::post('/qr-menu/{slug}/yonetici/urunler', [QrMenuManagerController::class, 'storeItem'])
        ->name('qr-menu.items.store');
    
    Route::get('/qr-menu/{slug}/yonetici/urunler/{item}', [QrMenuManagerController::class, 'getItem'])
        ->name('qr-menu.items.get');
    
    Route::put('/qr-menu/{slug}/yonetici/urunler/{item}', [QrMenuManagerController::class, 'updateItem'])
        ->name('qr-menu.items.update');
    
    Route::delete('/qr-menu/{slug}/yonetici/urunler/{item}', [QrMenuManagerController::class, 'destroyItem'])
        ->name('qr-menu.items.destroy');
    
    // Ürün durumu toggle
    Route::patch('/qr-menu/{slug}/yonetici/urunler/{item}/durum', [QrMenuManagerController::class, 'toggleItemStatus'])
        ->name('qr-menu.items.toggle-status');
    
    // QR kod yeniden oluştur
    Route::post('/qr-menu/{slug}/yonetici/qr-kod-olustur', [QrMenuManagerController::class, 'regenerateQrCode'])
        ->name('qr-menu.regenerate-qr');
    
    // QR kod indir
    Route::get('/qr-menu/{slug}/yonetici/qr-kod-indir', [QrMenuManagerController::class, 'downloadQrCode'])
        ->name('qr-menu.download-qr');
    
    // Kullanıcı yönetimi (sadece owner)
    Route::middleware(['qr-menu-owner'])->group(function () {
        Route::get('/qr-menu/{slug}/yonetici/kullanicilar', [QrMenuManagerController::class, 'users'])
            ->name('qr-menu.users');
        
        Route::post('/qr-menu/{slug}/yonetici/kullanicilar', [QrMenuManagerController::class, 'storeUser'])
            ->name('qr-menu.users.store');
        
        Route::put('/qr-menu/{slug}/yonetici/kullanicilar/{user}', [QrMenuManagerController::class, 'updateUser'])
            ->name('qr-menu.users.update');
        
        Route::delete('/qr-menu/{slug}/yonetici/kullanicilar/{user}', [QrMenuManagerController::class, 'destroyUser'])
            ->name('qr-menu.users.destroy');
    });
}); 