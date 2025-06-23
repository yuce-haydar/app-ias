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
    SettingController
};

Route::middleware(['auth', 'admin'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Authentication
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login')->withoutMiddleware(['auth', 'admin']);
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit')->withoutMiddleware(['auth', 'admin']);
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
    
    // FAQ Management
    Route::resource('faqs', FaqController::class)->names('admin.faqs');
    
    // Services Management
    Route::resource('services', ServiceController::class)->names('admin.services');
    
    // Projects Management
    Route::resource('projects', ProjectController::class)->names('admin.projects');
    
    // Facilities Management
    Route::resource('facilities', FacilityController::class)->names('admin.facilities');
    
    // News Management
    Route::resource('news', NewsController::class)->names('admin.news');
    
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
});