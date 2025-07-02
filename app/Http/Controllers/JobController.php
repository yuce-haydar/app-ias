<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;

class JobController extends Controller
{
    /**
     * İş ilanları listesi
     */
    public function index()
    {
        $jobs = JobPosting::where('status', 'active')
            ->where('deadline', '>', now())
            ->orderBy('posting_date', 'desc')
            ->paginate(12);



        return view('hr.careers', compact('jobs'));
    }

    /**
     * İş ilanı detayı
     */
    public function details($id)
    {
        $job = JobPosting::where('status', 'active')
            ->findOrFail($id);

        // Görüntülenme sayısını artır
        $job->increment('view_count');

        // İlgili iş ilanları
        $relatedJobs = JobPosting::where('status', 'active')
            ->where('id', '!=', $id)
            ->where('department', $job->department)
            ->where('deadline', '>', now())
            ->orderBy('posting_date', 'desc')
            ->take(3)
            ->get();

        return view('hr.job-details', compact('job', 'relatedJobs'));
    }

    /**
     * İş başvuru kaydet
     */
    public function apply(Request $request, $id)
    {
        $job = JobPosting::where('status', 'active')
            ->findOrFail($id);

        // Başvuru süresi kontrol et
        if ($job->deadline && $job->deadline->isPast()) {
            return redirect()->route('job.details', $id)
                ->with('error', 'Bu iş ilanının başvuru süresi dolmuştur.');
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'education_level' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'cv_file' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string',
            'portfolio_url' => 'nullable|url',
        ]);

        // CV dosyasını kaydet
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->store('job-applications', 'public');
            $validated['cv_file'] = $cvPath;
        }

        $validated['job_posting_id'] = $job->id;
        $validated['application_date'] = now();

        \App\Models\JobApplication::create($validated);

        return redirect()->route('job.details', $id)
            ->with('success', 'Başvurunuz başarıyla alınmıştır. En kısa sürede size dönüş yapacağız.');
    }

    /**
     * İnsan kaynakları ana sayfa
     */
    public function hrIndex()
    {
        $activeJobs = JobPosting::where('status', 'active')
            ->where('deadline', '>', now())
            ->orderBy('posting_date', 'desc')
            ->take(6)
            ->get();



        return view('hr.index', compact('activeJobs'));
    }
} 