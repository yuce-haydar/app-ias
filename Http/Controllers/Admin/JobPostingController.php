<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::latest()->paginate(20);
        return view('admin.job-postings.index', compact('jobPostings'));
    }

    public function create()
    {
        return view('admin.job-postings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position_type' => 'required|in:full_time,part_time,contract,intern',
            'education_level' => 'required|string|max:255',
            'experience_required' => 'nullable|string|max:255',
            'job_description' => 'required',
            'requirements' => 'nullable',
            'responsibilities' => 'nullable',
            'qualifications' => 'nullable',
            'location' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'show_salary' => 'boolean',
            'posting_date' => 'required|date',
            'deadline' => 'required|date|after:posting_date',
            'number_of_positions' => 'required|integer|min:1',
            'status' => 'required|in:draft,active,closed'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['show_salary'] = $request->has('show_salary');

        JobPosting::create($validated);

        return redirect()->route('admin.job-postings.index')
            ->with('success', 'İş ilanı başarıyla oluşturuldu.');
    }

    public function edit(JobPosting $jobPosting)
    {
        return view('admin.job-postings.edit', compact('jobPosting'));
    }

    public function update(Request $request, JobPosting $jobPosting)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position_type' => 'required|in:full_time,part_time,contract,intern',
            'education_level' => 'required|string|max:255',
            'experience_required' => 'nullable|string|max:255',
            'job_description' => 'required',
            'requirements' => 'nullable',
            'responsibilities' => 'nullable',
            'qualifications' => 'nullable',
            'location' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'show_salary' => 'boolean',
            'posting_date' => 'required|date',
            'deadline' => 'required|date|after:posting_date',
            'number_of_positions' => 'required|integer|min:1',
            'status' => 'required|in:draft,active,closed'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['show_salary'] = $request->has('show_salary');

        $jobPosting->update($validated);

        return redirect()->route('admin.job-postings.index')
            ->with('success', 'İş ilanı başarıyla güncellendi.');
    }

    public function destroy(JobPosting $jobPosting)
    {
        $jobPosting->delete();

        return redirect()->route('admin.job-postings.index')
            ->with('success', 'İş ilanı başarıyla silindi.');
    }

    public function applications(JobPosting $jobPosting)
    {
        $applications = $jobPosting->applications()->latest()->paginate(20);
        return view('admin.job-postings.applications', compact('jobPosting', 'applications'));
    }
} 