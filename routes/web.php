<?php

use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('admin')->group(base_path('routes/admin.php'));

// QR Menu Routes
require base_path('routes/qr-menu.php');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ana Sayfa
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Hakkımızda Sayfası
Route::get('/hakkimizda', function () {
    return view('pages.about');
})->name('about');

// Bilgi Toplumu Hizmetleri
Route::get('/bilgi-toplumu-hizmetleri', function () {
    $informationServices = App\Models\InformationService::active()->ordered()->get();
    return view('pages.bilgi-toplumu-hizmetleri', compact('informationServices'));
})->name('bilgi-toplumu-hizmetleri');

// Hizmet Rotaları
Route::get('/hizmetler', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');
Route::get('/hizmet/{id}', [App\Http\Controllers\ServiceController::class, 'details'])->name('service.details');

// Blog Rotaları
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'grid'])->name('blog.grid');

Route::get('/blog-liste', [App\Http\Controllers\BlogController::class, 'list'])->name('blog.list');

Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'details'])->name('blog.details');

// Ekip Rotaları
Route::get('/ekip', [App\Http\Controllers\TeamController::class, 'index'])->name('team');
Route::get('/ekip/{id}', [App\Http\Controllers\TeamController::class, 'details'])->name('team.details');

// Projeler Rotaları
Route::get('/projeler', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects');

Route::get('/proje/{id}', [App\Http\Controllers\ProjectController::class, 'details'])->name('project.details');

// Tesisler Rotaları
Route::get('/tesisler', [App\Http\Controllers\FacilityController::class, 'index'])->name('facilities.index');

Route::get('/tesis/{id}', [App\Http\Controllers\FacilityController::class, 'details'])->name('facilities.details');

// Duyuru Rotaları
Route::get('/duyurular', [App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcements');
Route::get('/duyuru/{id}', [App\Http\Controllers\AnnouncementController::class, 'details'])->name('announcement.details');

// İhale Bilgileri Rotaları
Route::get('/ihale-bilgileri', [App\Http\Controllers\TenderController::class, 'index'])->name('tenders');
Route::get('/ihale/{id}', [App\Http\Controllers\TenderController::class, 'details'])->name('tender.details');
Route::get('/ihale/{id}/basvuru', [App\Http\Controllers\TenderController::class, 'application'])->name('tender.application');
Route::post('/ihale/{id}/basvuru', [App\Http\Controllers\TenderController::class, 'storeApplication'])->name('tender.application.store');

// İnsan Kaynakları Rotaları
Route::get('/insan-kaynaklari', [App\Http\Controllers\JobController::class, 'hrIndex'])->name('hr');
Route::get('/kariyer', [App\Http\Controllers\JobController::class, 'index'])->name('careers');
Route::get('/is-ilani/{id}', [App\Http\Controllers\JobController::class, 'details'])->name('job.details');
Route::post('/is-ilani/{id}/basvuru', [App\Http\Controllers\JobController::class, 'apply'])->name('job.apply');



// SSS Sayfası
Route::get('/sss', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');

// İletişim Rotaları
Route::get('/iletisim', function () {
    return view('contact.index');
})->name('contact');

Route::post('/iletisim', function () {
    // İletişim formu işleme mantığı burada olacak
    return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi!');
})->name('contact.store');

// Bülten Aboneliği
Route::post('/bulten-aboneligi', function () {
    // Bülten aboneliği işleme mantığı burada olacak
    return redirect()->back()->with('success', 'Bülten aboneliğiniz başarıyla oluşturuldu!');
})->name('newsletter.subscribe');

// Yasal sayfalar
Route::get('/sartlar-ve-kosullar', function () {
    return view('legal.terms');
})->name('terms');

Route::get('/gizlilik-politikasi', function () {
    return view('legal.privacy');
})->name('privacy');

Route::get('/yasal', function () {
    return view('legal.legal');
})->name('legal');

// KVKK sayfalar
Route::get('/cerez-aydinlatma-metni', function () {
    return view('legal.cookies-notice');
})->name('cookies-notice');

Route::get('/cerez-politikasi', function () {
    return view('legal.cookies-policy');
})->name('cookies-policy');

Route::get('/ilan-basvuru-aydinlatma-metni', function () {
    return view('legal.job-application-notice');
})->name('job-application-notice');

Route::get('/iletisim-aydinlatma-metni', function () {
    return view('legal.contact-notice');
})->name('contact-notice');

// Logo test rotası
Route::get('/test-logo', function () {
    return view('test-logo');
})->name('test-logo');
