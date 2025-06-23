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
        $tenders = Tender::with('applications')->latest()->paginate(10);
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
            'tender_no' => 'required|string|unique:tenders,tender_no',
            'category' => 'required|string',
            'estimated_value' => 'nullable|numeric|min:0',
            'currency' => 'required|string|in:TRY,USD,EUR',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date|after:application_start_date',
            'tender_date' => 'required|date|after:application_end_date',
            'requirements' => 'nullable|string',
            'contact_info' => 'nullable|string',
            'status' => 'boolean',
            'featured' => 'boolean'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');
        $data['featured'] = $request->has('featured');

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
            'tender_no' => 'required|string|unique:tenders,tender_no,' . $tender->id,
            'category' => 'required|string',
            'estimated_value' => 'nullable|numeric|min:0',
            'currency' => 'required|string|in:TRY,USD,EUR',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date|after:application_start_date',
            'tender_date' => 'required|date|after:application_end_date',
            'requirements' => 'nullable|string',
            'contact_info' => 'nullable|string',
            'status' => 'boolean',
            'featured' => 'boolean'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');
        $data['featured'] = $request->has('featured');

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
