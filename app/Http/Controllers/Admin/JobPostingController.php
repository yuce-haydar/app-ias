<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    /**
     * Display a listing of the job postings.
     */
    public function index()
    {
        $jobPostings = JobPosting::with('applications')->latest()->paginate(10);
        return view('admin.job-postings.index', compact('jobPostings'));
    }

    /**
     * Show the form for creating a new job posting.
     */
    public function create()
    {
        return view('admin.job-postings.create');
    }

    /**
     * Store a newly created job posting in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'department' => 'required|string',
            'position_type' => 'required|string|in:full-time,part-time,contract,internship',
            'experience_required' => 'required|integer|min:0',
            'education_required' => 'required|string',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|gte:salary_min',
            'currency' => 'required|string|in:TRY,USD,EUR',
            'location' => 'required|string',
            'requirements' => 'nullable|array',
            'benefits' => 'nullable|array',
            'application_deadline' => 'required|date|after:today',
            'status' => 'boolean',
            'featured' => 'boolean'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');
        $data['featured'] = $request->has('featured');

        JobPosting::create($data);

        return redirect()->route('admin.job-postings.index')
                        ->with('success', 'İş ilanı başarıyla oluşturuldu.');
    }

    /**
     * Display the specified job posting.
     */
    public function show(JobPosting $jobPosting)
    {
        $jobPosting->load('applications');
        return view('admin.job-postings.show', compact('jobPosting'));
    }

    /**
     * Show the form for editing the specified job posting.
     */
    public function edit(JobPosting $jobPosting)
    {
        return view('admin.job-postings.edit', compact('jobPosting'));
    }

    /**
     * Update the specified job posting in storage.
     */
    public function update(Request $request, JobPosting $jobPosting)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'department' => 'required|string',
            'position_type' => 'required|string|in:full-time,part-time,contract,internship',
            'experience_required' => 'required|integer|min:0',
            'education_required' => 'required|string',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|gte:salary_min',
            'currency' => 'required|string|in:TRY,USD,EUR',
            'location' => 'required|string',
            'requirements' => 'nullable|array',
            'benefits' => 'nullable|array',
            'application_deadline' => 'required|date|after:today',
            'status' => 'boolean',
            'featured' => 'boolean'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');
        $data['featured'] = $request->has('featured');

        $jobPosting->update($data);

        return redirect()->route('admin.job-postings.index')
                        ->with('success', 'İş ilanı başarıyla güncellendi.');
    }

    /**
     * Remove the specified job posting from storage.
     */
    public function destroy(JobPosting $jobPosting)
    {
        $jobPosting->delete();

        return redirect()->route('admin.job-postings.index')
                        ->with('success', 'İş ilanı başarıyla silindi.');
    }

    /**
     * Show applications for a specific job posting.
     */
    public function applications(JobPosting $jobPosting)
    {
        $applications = $jobPosting->applications()->latest()->paginate(10);
        return view('admin.job-postings.applications', compact('jobPosting', 'applications'));
    }
}
