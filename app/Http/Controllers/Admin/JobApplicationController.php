<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the job applications.
     */
    public function index()
    {
        $applications = JobApplication::with('jobPosting')->latest()->paginate(10);
        return view('admin.job-applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new job application.
     */
    public function create()
    {
        // Genellikle application'lar kullanıcılar tarafından oluşturulur
        // Ama admin panelinde manuel oluşturmak için
        $jobPostings = \App\Models\JobPosting::active()->get();
        return view('admin.job-applications.create', compact('jobPostings'));
    }

    /**
     * Store a newly created job application in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_posting_id' => 'required|exists:job_postings,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'education' => 'nullable|array',
            'experience' => 'nullable|array',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string',
            'status' => 'required|string|in:pending,approved,rejected',
            'notes' => 'nullable|string'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('cv_file')) {
            $data['cv_file'] = $request->file('cv_file')->store('cvs', 'public');
        }

        $data['applied_at'] = now();

        JobApplication::create($data);

        return redirect()->route('admin.job-applications.index')
                        ->with('success', 'İş başvurusu başarıyla oluşturuldu.');
    }

    /**
     * Display the specified job application.
     */
    public function show(JobApplication $jobApplication)
    {
        $jobApplication->load('jobPosting');
        return view('admin.job-applications.show', compact('jobApplication'));
    }

    /**
     * Show the form for editing the specified job application.
     */
    public function edit(JobApplication $jobApplication)
    {
        $jobPostings = \App\Models\JobPosting::active()->get();
        return view('admin.job-applications.edit', compact('jobApplication', 'jobPostings'));
    }

    /**
     * Update the specified job application in storage.
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        $request->validate([
            'job_posting_id' => 'required|exists:job_postings,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'education' => 'nullable|array',
            'experience' => 'nullable|array',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string',
            'status' => 'required|string|in:pending,approved,rejected',
            'notes' => 'nullable|string'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('cv_file')) {
            if ($jobApplication->cv_file) {
                Storage::disk('public')->delete($jobApplication->cv_file);
            }
            $data['cv_file'] = $request->file('cv_file')->store('cvs', 'public');
        }

        $jobApplication->update($data);

        return redirect()->route('admin.job-applications.index')
                        ->with('success', 'İş başvurusu başarıyla güncellendi.');
    }

    /**
     * Remove the specified job application from storage.
     */
    public function destroy(JobApplication $jobApplication)
    {
        if ($jobApplication->cv_file) {
            Storage::disk('public')->delete($jobApplication->cv_file);
        }
        
        $jobApplication->delete();

        return redirect()->route('admin.job-applications.index')
                        ->with('success', 'İş başvurusu başarıyla silindi.');
    }

    /**
     * Update the status of a job application.
     */
    public function updateStatus(Request $request, JobApplication $jobApplication)
    {
        $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
            'notes' => 'nullable|string'
        ]);

        $jobApplication->update([
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return redirect()->back()
                        ->with('success', 'Başvuru durumu başarıyla güncellendi.');
    }
}
