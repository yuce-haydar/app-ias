<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TenderApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenderApplicationController extends Controller
{
    /**
     * Display a listing of the tender applications.
     */
    public function index()
    {
        $applications = TenderApplication::with('tender')->latest()->paginate(10);
        return view('admin.tender-applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new tender application.
     */
    public function create()
    {
        $tenders = \App\Models\Tender::active()->get();
        return view('admin.tender-applications.create', compact('tenders'));
    }

    /**
     * Store a newly created tender application in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tender_id' => 'required|exists:tenders,id',
            'company_name' => 'required|string|max:255',
            'company_type' => 'required|string',
            'tax_number' => 'required|string|max:50',
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'previous_works' => 'nullable|array',
            'financial_capacity' => 'nullable|numeric|min:0',
            'technical_capacity' => 'nullable|string',
            'documents' => 'nullable|array',
            'bid_amount' => 'required|numeric|min:0',
            'currency' => 'required|string|in:TRY,USD,EUR',
            'status' => 'required|string|in:pending,approved,rejected',
            'notes' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['applied_at'] = now();

        TenderApplication::create($data);

        return redirect()->route('admin.tender-applications.index')
                        ->with('success', 'İhale başvurusu başarıyla oluşturuldu.');
    }

    /**
     * Display the specified tender application.
     */
    public function show(TenderApplication $tenderApplication)
    {
        $tenderApplication->load('tender');
        return view('admin.tender-applications.show', compact('tenderApplication'));
    }

    /**
     * Show the form for editing the specified tender application.
     */
    public function edit(TenderApplication $tenderApplication)
    {
        $tenders = \App\Models\Tender::active()->get();
        return view('admin.tender-applications.edit', compact('tenderApplication', 'tenders'));
    }

    /**
     * Update the specified tender application in storage.
     */
    public function update(Request $request, TenderApplication $tenderApplication)
    {
        $request->validate([
            'tender_id' => 'required|exists:tenders,id',
            'company_name' => 'required|string|max:255',
            'company_type' => 'required|string',
            'tax_number' => 'required|string|max:50',
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'previous_works' => 'nullable|array',
            'financial_capacity' => 'nullable|numeric|min:0',
            'technical_capacity' => 'nullable|string',
            'documents' => 'nullable|array',
            'bid_amount' => 'required|numeric|min:0',
            'currency' => 'required|string|in:TRY,USD,EUR',
            'status' => 'required|string|in:pending,approved,rejected',
            'notes' => 'nullable|string'
        ]);

        $data = $request->all();
        $tenderApplication->update($data);

        return redirect()->route('admin.tender-applications.index')
                        ->with('success', 'İhale başvurusu başarıyla güncellendi.');
    }

    /**
     * Remove the specified tender application from storage.
     */
    public function destroy(TenderApplication $tenderApplication)
    {
        $tenderApplication->delete();

        return redirect()->route('admin.tender-applications.index')
                        ->with('success', 'İhale başvurusu başarıyla silindi.');
    }

    /**
     * Update the status of a tender application.
     */
    public function updateStatus(Request $request, TenderApplication $tenderApplication)
    {
        $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
            'notes' => 'nullable|string'
        ]);

        $tenderApplication->update([
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return redirect()->back()
                        ->with('success', 'Başvuru durumu başarıyla güncellendi.');
    }
}
