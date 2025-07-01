<?php

use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('admin')->group(base_path('routes/admin.php'));

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

// İhale Bilgileri Rotaları
Route::get('/ihale-bilgileri', function () {
    return view('tenders.index');
})->name('tenders');

Route::get('/ihale/{id}', function ($id) {
    return view('tenders.details', compact('id'));
})->name('tender.details');

Route::get('/ilanlar', function () {
    return view('tenders.announcements');
})->name('announcements');

Route::get('/ilan-basvuru', function () {
    return view('tenders.application');
})->name('tender.application');

// İnsan Kaynakları Rotaları
Route::get('/insan-kaynaklari', function () {
    return view('hr.index');
})->name('hr');

Route::get('/kariyer', function () {
    return view('hr.careers');
})->name('careers');

Route::get('/is-ilani/{id}', function ($id) {
    return view('hr.job-details', compact('id'));
})->name('job.details');



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

// Logo test rotası
Route::get('/test-logo', function () {
    return view('test-logo');
})->name('test-logo');
