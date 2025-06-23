<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Project;
use App\Models\News;
use App\Models\ContactSubmission;
use App\Models\TenderApplication;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'facilities' => Facility::count(),
            'projects' => Project::count(),
            'news' => News::where('status', 'published')->count(),
            'contact_submissions' => ContactSubmission::where('is_read', false)->count(),
            'tender_applications' => TenderApplication::where('status', 'pending')->count(),
            'job_applications' => JobApplication::where('status', 'pending')->count(),
        ];
        
        $recentContacts = ContactSubmission::latest()
            ->take(5)
            ->get();
            
        $recentNews = News::latest()
            ->take(5)
            ->get();
        
        return view('admin.dashboard.index', compact('stats', 'recentContacts', 'recentNews'));
    }
}
