<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tender;

class TenderController extends Controller
{
    /**
     * İhale listesi
     */
    public function index()
    {
        $tenders = Tender::where('status', 'published')
            ->orderBy('application_deadline', 'desc')
            ->paginate(12);



        return view('tenders.index', compact('tenders'));
    }

    /**
     * İhale detayı
     */
    public function details($id)
    {
        $tender = Tender::where('status', 'published')
            ->findOrFail($id);

        // Görüntülenme sayısını artır
        $tender->increment('view_count');

        // İlgili ihaleler
        $relatedTenders = Tender::where('status', 'published')
            ->where('id', '!=', $id)
            ->where('category', $tender->category)
            ->orderBy('application_deadline', 'desc')
            ->take(3)
            ->get();

        return view('tenders.details', compact('tender', 'relatedTenders'));
    }

    /**
     * İhale başvuru sayfası
     */
    public function application($id)
    {
        $tender = Tender::where('status', 'published')
            ->findOrFail($id);

        // Başvuru süresi kontrol et
        if ($tender->application_deadline && $tender->application_deadline->isPast()) {
            return redirect()->route('tender.details', $id)
                ->with('error', 'Bu ihalenin başvuru süresi dolmuştur.');
        }

        return view('tenders.tender-application', compact('tender'));
    }

    /**
     * İhale başvuru kaydet
     */
    public function storeApplication(Request $request, $id)
    {
        $tender = Tender::where('status', 'published')
            ->findOrFail($id);

        // Başvuru süresi kontrol et
        if ($tender->application_deadline && $tender->application_deadline->isPast()) {
            return redirect()->route('tender.details', $id)
                ->with('error', 'Bu ihalenin başvuru süresi dolmuştur.');
        }

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'tax_number' => 'nullable|string|max:20',
            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx|max:10240',
            'message' => 'nullable|string',
        ]);

        // Belgeleri kaydet
        $documents = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('tender-applications', 'public');
                $documents[] = $path;
            }
        }

        $validated['documents'] = $documents;
        $validated['tender_id'] = $tender->id;
        $validated['application_date'] = now();

        \App\Models\TenderApplication::create($validated);

        return redirect()->route('tender.details', $id)
            ->with('success', 'Başvurunuz başarıyla alınmıştır. En kısa sürede size dönüş yapacağız.');
    }
} 