<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\JobPosting;
use App\Models\Tender;
use App\Models\News;
use App\Models\Project;
use App\Models\ContactSubmission;
use App\Models\JobApplication;
use App\Models\TenderApplication;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'announcements' => Announcement::count(),
            'job_postings' => JobPosting::count(),
            'tenders' => Tender::count(),
            'news' => News::count(),
            'projects' => Project::count(),
            'contact_submissions' => ContactSubmission::where('is_read', false)->count(),
            'job_applications' => JobApplication::where('status', 'pending')->count(),
            'tender_applications' => TenderApplication::where('status', 'pending')->count(),
        ];

        $recent_announcements = Announcement::latest()->take(5)->get();
        $recent_contact_submissions = ContactSubmission::where('is_read', false)->latest()->take(5)->get();
        $recent_job_applications = JobApplication::with('jobPosting')->latest()->take(5)->get();
        $recent_tender_applications = TenderApplication::with('tender')->latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'stats', 
            'recent_announcements', 
            'recent_contact_submissions',
            'recent_job_applications',
            'recent_tender_applications'
        ));
    }
} 