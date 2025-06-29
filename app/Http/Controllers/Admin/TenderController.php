<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    /**
     * Display a listing of the tenders.
     */
    public function index()
    {
        $tenders = Tender::withCount('applications')->latest()->paginate(10);
        return view('admin.tenders.index', compact('tenders'));
    }

    /**
     * Show the form for creating a new tender.
     */
    public function create()
    {
        return view('admin.tenders.create');
    }

    /**
     * Store a newly created tender in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tender_number' => 'required|string|unique:tenders,tender_number',
            'tender_type' => 'required|string|in:goods,services,construction,consulting',
            'procurement_method' => 'required|string|in:open,restricted,negotiated,direct',
            'estimated_cost' => 'nullable|numeric|min:0',
            'announcement_date' => 'required|date',
            'deadline' => 'required|date|after:announcement_date',
            'tender_date' => 'nullable|date',
            'tender_time' => 'nullable',
            'tender_location' => 'nullable|string',
            'requirements' => 'nullable|string',
            'contact_person' => 'required|string',
            'contact_phone' => 'required|string',
            'contact_email' => 'required|email',
            'status' => 'required|string|in:draft,published,closed,cancelled,completed',
            'featured' => 'nullable|boolean'
        ]);

        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['slug'] = \Illuminate\Support\Str::slug($request->title . '-' . time());
        
        // tender_number form alanından gelen değeri hem tender_number hem tender_no olarak kaydet
        if (isset($data['tender_number'])) {
            $data['tender_no'] = $data['tender_number'];
        }

        Tender::create($data);

        return redirect()->route('admin.tenders.index')
                        ->with('success', 'İhale başarıyla oluşturuldu.');
    }

    /**
     * Display the specified tender.
     */
    public function show(Tender $tender)
    {
        $tender->load('applications');
        return view('admin.tenders.show', compact('tender'));
    }

    /**
     * Show the form for editing the specified tender.
     */
    public function edit(Tender $tender)
    {
        return view('admin.tenders.edit', compact('tender'));
    }

    /**
     * Update the specified tender in storage.
     */
    public function update(Request $request, Tender $tender)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tender_number' => 'required|string|unique:tenders,tender_number,' . $tender->id,
            'tender_type' => 'required|string|in:goods,services,construction,consulting',
            'procurement_method' => 'required|string|in:open,restricted,negotiated,direct',
            'estimated_cost' => 'nullable|numeric|min:0',
            'announcement_date' => 'required|date',
            'deadline' => 'required|date|after:announcement_date',
            'tender_date' => 'nullable|date',
            'tender_time' => 'nullable',
            'tender_location' => 'nullable|string',
            'requirements' => 'nullable|string',
            'contact_person' => 'required|string',
            'contact_phone' => 'required|string',
            'contact_email' => 'required|email',
            'status' => 'required|string|in:draft,published,closed,cancelled,completed',
            'featured' => 'nullable|boolean'
        ]);

        $data = $request->all();
        $data['featured'] = $request->has('featured');
        
        // tender_number form alanından gelen değeri hem tender_number hem tender_no olarak kaydet
        if (isset($data['tender_number'])) {
            $data['tender_no'] = $data['tender_number'];
        }
        
        // Eğer title değiştiyse slug'ı güncelle
        if ($request->title !== $tender->title) {
            $data['slug'] = \Illuminate\Support\Str::slug($request->title . '-' . time());
        }

        $tender->update($data);

        return redirect()->route('admin.tenders.index')
                        ->with('success', 'İhale başarıyla güncellendi.');
    }

    /**
     * Remove the specified tender from storage.
     */
    public function destroy(Tender $tender)
    {
        $tender->delete();

        return redirect()->route('admin.tenders.index')
                        ->with('success', 'İhale başarıyla silindi.');
    }

    /**
     * Show applications for a specific tender.
     */
    public function applications(Tender $tender)
    {
        $applications = $tender->applications()->latest()->paginate(10);
        return view('admin.tenders.applications', compact('tender', 'applications'));
    }
}
