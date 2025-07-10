<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    AnnouncementController,
    TenderController,
    JobPostingController,
    JobApplicationController,
    TenderApplicationController,
    TeamMemberController,
    AuthController,
    UserController,
    FaqController,
    ServiceController,
    ProjectController,
    FacilityController,
    NewsController,
    ContactSubmissionController,
    SettingController,
    HomePageController,
    SettingsController,
    InformationServiceController,
    AboutPageController
};

// Authentication routes (middleware group dışında)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Admin routes (middleware group içinde)
Route::middleware(['admin'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Authentication (sadece logout)
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Tenders Management (İhaleler)
    Route::resource('tenders', TenderController::class)->names('admin.tenders');
    Route::get('tenders/{tender}/applications', [TenderController::class, 'applications'])->name('admin.tenders.applications');
    
    // Tender Applications Management (İhale Başvuruları)
    Route::resource('tender-applications', TenderApplicationController::class)->names('admin.tender-applications');
    Route::patch('tender-applications/{tenderApplication}/status', [TenderApplicationController::class, 'updateStatus'])->name('admin.tender-applications.status');
    
    // Announcements Management (Duyurular)
    Route::resource('announcements', AnnouncementController::class)->names('admin.announcements');
    
    // Job Postings Management (İş İlanları)
    Route::resource('job-postings', JobPostingController::class)->names('admin.job-postings');
    Route::get('job-postings/{jobPosting}/applications', [JobPostingController::class, 'applications'])->name('admin.job-postings.applications');
    
    // Job Applications Management (İş Başvuruları)
    Route::resource('job-applications', JobApplicationController::class)->names('admin.job-applications');
    Route::patch('job-applications/{jobApplication}/status', [JobApplicationController::class, 'updateStatus'])->name('admin.job-applications.status');
    
    // Team Members Management
    Route::resource('team-members', TeamMemberController::class)->names('admin.team-members');
    
    // Ekip alias (Team Members için Türkçe route)
    Route::get('ekip', [TeamMemberController::class, 'index'])->name('admin.ekip.index');
    Route::get('ekip/create', [TeamMemberController::class, 'create'])->name('admin.ekip.create');
    Route::post('ekip', [TeamMemberController::class, 'store'])->name('admin.ekip.store');
    Route::get('ekip/{team_member}', [TeamMemberController::class, 'show'])->name('admin.ekip.show');
    Route::get('ekip/{team_member}/edit', [TeamMemberController::class, 'edit'])->name('admin.ekip.edit');
    Route::put('ekip/{team_member}', [TeamMemberController::class, 'update'])->name('admin.ekip.update');
    Route::delete('ekip/{team_member}', [TeamMemberController::class, 'destroy'])->name('admin.ekip.destroy');
    
    // FAQ Management
    Route::resource('faqs', FaqController::class)->names('admin.faqs');
    
    // Services Management
    Route::resource('services', ServiceController::class)->names('admin.services');
    
    // Projects Management
    Route::resource('projects', ProjectController::class)->names('admin.projects');
    
    // Facilities Management
    Route::resource('facilities', FacilityController::class)->names('admin.facilities');
    
    // QR Menu Management for Facilities
    Route::get('facilities/{facility}/qr-menu/create', [FacilityController::class, 'createQrMenu'])->name('admin.facilities.qr-menu.create');
    Route::post('facilities/{facility}/qr-menu', [FacilityController::class, 'storeQrMenu'])->name('admin.facilities.qr-menu.store');
    Route::get('facilities/{facility}/qr-menu/edit', [FacilityController::class, 'editQrMenu'])->name('admin.facilities.qr-menu.edit');
    Route::put('facilities/{facility}/qr-menu', [FacilityController::class, 'updateQrMenu'])->name('admin.facilities.qr-menu.update');
    Route::delete('facilities/{facility}/qr-menu', [FacilityController::class, 'destroyQrMenu'])->name('admin.facilities.qr-menu.destroy');
    Route::post('facilities/{facility}/qr-menu/regenerate', [FacilityController::class, 'regenerateQrCode'])->name('admin.facilities.qr-menu.regenerate');
    Route::get('facilities/{facility}/qr-menu/download', [FacilityController::class, 'downloadQrCode'])->name('admin.facilities.qr-menu.download');
    
    // News Management
    Route::resource('news', NewsController::class)->names('admin.news');
    
    // Information Services Management (Bilgi Toplumu Hizmetleri)
    Route::resource('information-services', InformationServiceController::class)->names('admin.information-services');
    
    // Contact Submissions
    Route::resource('contact-submissions', ContactSubmissionController::class)->names('admin.contact-submissions')
        ->only(['index', 'show', 'destroy']);
    Route::patch('contact-submissions/{contactSubmission}/mark-replied', [ContactSubmissionController::class, 'markReplied'])->name('admin.contact-submissions.mark-replied');
    Route::patch('contact-submissions/{contactSubmission}/update-notes', [ContactSubmissionController::class, 'updateNotes'])->name('admin.contact-submissions.update-notes');
    
    // Users Management
    Route::resource('users', UserController::class)->names('admin.users');
    
    // Settings
    Route::resource('settings', SettingController::class)->names('admin.settings')
        ->only(['index', 'store']);
        
    // Site Settings (Header/Footer Management)
    Route::get('site-settings', [SettingsController::class, 'index'])->name('admin.site-settings.index');
    Route::put('site-settings', [SettingsController::class, 'update'])->name('admin.site-settings.update');
    Route::delete('site-settings/image', [SettingsController::class, 'deleteImage'])->name('admin.site-settings.delete-image');
    
    // Homepage Management
    Route::get('homepage', [HomePageController::class, 'index'])->name('admin.homepage.index');
    Route::put('homepage', [HomePageController::class, 'update'])->name('admin.homepage.update');
    Route::delete('homepage/image', [HomePageController::class, 'deleteImage'])->name('admin.homepage.delete-image');
    
    // About Page Management
    Route::get('about-page', [AboutPageController::class, 'index'])->name('admin.about-page.index');
    Route::put('about-page', [AboutPageController::class, 'update'])->name('admin.about-page.update');
    Route::delete('about-page/image', [AboutPageController::class, 'deleteImage'])->name('admin.about-page.delete-image');
});