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
            'job_description' => 'required|string',
            'department' => 'required|string',
            'position_type' => 'required|string|in:full_time,part_time,contract,intern',
            'experience_required' => 'nullable|string',
            'education_level' => 'required|string',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|gte:salary_min',
            'show_salary' => 'nullable|boolean',
            'location' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'posting_date' => 'required|date',
            'deadline' => 'required|date|after:posting_date',
            'number_of_positions' => 'required|integer|min:1',
            'status' => 'required|string|in:draft,active,closed'
        ]);

        $data = $request->all();
        $data['show_salary'] = $request->has('show_salary');
        $data['slug'] = \Illuminate\Support\Str::slug($request->title . '-' . time());
        
        // Boş alanları null olarak ayarla
        if (empty($data['experience_required'])) {
            $data['experience_required'] = null;
        }
        
        // JSON alanları için dönüştürme
        if ($request->requirements) {
            $data['requirements'] = array_filter(explode("\n", trim($request->requirements)));
        }
        if ($request->responsibilities) {
            $data['responsibilities'] = array_filter(explode("\n", trim($request->responsibilities)));
        }
        if ($request->qualifications) {
            $data['qualifications'] = array_filter(explode("\n", trim($request->qualifications)));
        }

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
            'job_description' => 'required|string',
            'department' => 'required|string',
            'position_type' => 'required|string|in:full_time,part_time,contract,intern',
            'experience_required' => 'nullable|string',
            'education_level' => 'required|string',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|gte:salary_min',
            'show_salary' => 'nullable|boolean',
            'location' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'posting_date' => 'required|date',
            'deadline' => 'required|date|after:posting_date',
            'number_of_positions' => 'required|integer|min:1',
            'status' => 'required|string|in:draft,active,closed'
        ]);

        $data = $request->all();
        $data['show_salary'] = $request->has('show_salary');
        
        // Boş alanları null olarak ayarla
        if (empty($data['experience_required'])) {
            $data['experience_required'] = null;
        }
        
        // Eğer title değiştiyse slug'ı güncelle
        if ($request->title !== $jobPosting->title) {
            $data['slug'] = \Illuminate\Support\Str::slug($request->title . '-' . time());
        }
        
        // JSON alanları için dönüştürme
        if ($request->requirements) {
            $data['requirements'] = array_filter(explode("\n", trim($request->requirements)));
        }
        if ($request->responsibilities) {
            $data['responsibilities'] = array_filter(explode("\n", trim($request->responsibilities)));
        }
        if ($request->qualifications) {
            $data['qualifications'] = array_filter(explode("\n", trim($request->qualifications)));
        }

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
