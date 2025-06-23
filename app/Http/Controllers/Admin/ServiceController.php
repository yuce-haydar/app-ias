<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'service_category' => 'required|string',
            'features' => 'nullable|array',
            'benefits' => 'nullable|array',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        // Handle gallery upload
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('services/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Hizmet başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'service_category' => 'required|string',
            'features' => 'nullable|array',
            'benefits' => 'nullable|array',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        // Handle gallery upload
        if ($request->hasFile('gallery')) {
            $gallery = $service->gallery ?? [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('services/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Hizmet başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        
        // Delete image
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        
        // Delete gallery images
        if ($service->gallery) {
            foreach ($service->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Hizmet başarıyla silindi.');
    }
}
