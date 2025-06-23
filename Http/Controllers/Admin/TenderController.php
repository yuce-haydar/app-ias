<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TenderController extends Controller
{
    public function index()
    {
        $tenders = Tender::latest()->paginate(20);
        return view('admin.tenders.index', compact('tenders'));
    }

    public function create()
    {
        return view('admin.tenders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tender_number' => 'required|string|max:255|unique:tenders',
            'description' => 'required',
            'tender_type' => 'required|in:goods,services,construction,consulting',
            'procurement_method' => 'required|in:open,restricted,negotiated,direct',
            'estimated_cost' => 'nullable|numeric|min:0',
            'announcement_date' => 'required|date',
            'deadline' => 'required|date|after:announcement_date',
            'tender_date' => 'nullable|date|after_or_equal:deadline',
            'tender_time' => 'nullable|date_format:H:i',
            'tender_location' => 'nullable|string|max:500',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:20480',
            'requirements' => 'nullable',
            'contact_person' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:50',
            'contact_email' => 'required|email|max:255',
            'status' => 'required|in:draft,published,closed,cancelled,completed'
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Dosya yükleme
        if ($request->hasFile('documents')) {
            $documents = [];
            foreach ($request->file('documents') as $file) {
                $path = $file->store('tenders/documents', 'public');
                $documents[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize()
                ];
            }
            $validated['documents'] = $documents;
        }

        Tender::create($validated);

        return redirect()->route('admin.tenders.index')
            ->with('success', 'İhale başarıyla oluşturuldu.');
    }

    public function edit(Tender $tender)
    {
        return view('admin.tenders.edit', compact('tender'));
    }

    public function update(Request $request, Tender $tender)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tender_number' => 'required|string|max:255|unique:tenders,tender_number,' . $tender->id,
            'description' => 'required',
            'tender_type' => 'required|in:goods,services,construction,consulting',
            'procurement_method' => 'required|in:open,restricted,negotiated,direct',
            'estimated_cost' => 'nullable|numeric|min:0',
            'announcement_date' => 'required|date',
            'deadline' => 'required|date|after:announcement_date',
            'tender_date' => 'nullable|date|after_or_equal:deadline',
            'tender_time' => 'nullable|date_format:H:i',
            'tender_location' => 'nullable|string|max:500',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:20480',
            'requirements' => 'nullable',
            'contact_person' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:50',
            'contact_email' => 'required|email|max:255',
            'status' => 'required|in:draft,published,closed,cancelled,completed'
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Dosya yükleme
        if ($request->hasFile('documents')) {
            // Eski dosyaları sil
            if ($tender->documents) {
                foreach ($tender->documents as $document) {
                    Storage::disk('public')->delete($document['path']);
                }
            }

            $documents = [];
            foreach ($request->file('documents') as $file) {
                $path = $file->store('tenders/documents', 'public');
                $documents[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize()
                ];
            }
            $validated['documents'] = $documents;
        }

        $tender->update($validated);

        return redirect()->route('admin.tenders.index')
            ->with('success', 'İhale başarıyla güncellendi.');
    }

    public function destroy(Tender $tender)
    {
        // Dosyaları sil
        if ($tender->documents) {
            foreach ($tender->documents as $document) {
                Storage::disk('public')->delete($document['path']);
            }
        }

        $tender->delete();

        return redirect()->route('admin.tenders.index')
            ->with('success', 'İhale başarıyla silindi.');
    }

    public function applications(Tender $tender)
    {
        $applications = $tender->applications()->latest()->paginate(20);
        return view('admin.tenders.applications', compact('tender', 'applications'));
    }
} 