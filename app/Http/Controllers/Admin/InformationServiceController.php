<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = InformationService::ordered()->paginate(10);
        return view('admin.information-services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.information-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            'order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('document')) {
            $data['document'] = $request->file('document')->store('information-services', 'public');
        }

        InformationService::create($data);

        return redirect()->route('admin.information-services.index')
            ->with('success', 'Bilgi başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(InformationService $informationService)
    {
        return view('admin.information-services.show', compact('informationService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformationService $informationService)
    {
        return view('admin.information-services.edit', compact('informationService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformationService $informationService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            'order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('document')) {
            // Eski dosyayı sil
            if ($informationService->document) {
                Storage::disk('public')->delete($informationService->document);
            }
            $data['document'] = $request->file('document')->store('information-services', 'public');
        }

        $informationService->update($data);

        return redirect()->route('admin.information-services.index')
            ->with('success', 'Bilgi başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformationService $informationService)
    {
        // Dosyayı sil
        if ($informationService->document) {
            Storage::disk('public')->delete($informationService->document);
        }
        
        $informationService->delete();

        return redirect()->route('admin.information-services.index')
            ->with('success', 'Bilgi başarıyla silindi.');
    }
}
