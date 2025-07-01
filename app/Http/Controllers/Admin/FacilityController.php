<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'facility_type' => 'required|string',
            'category' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'opening_date' => 'nullable|date',
            'capacity' => 'nullable|string',
            'features' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'google_maps_link' => 'nullable|url',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360'
        ]);

        // Text alanlarını array'e çevir
        if ($validated['features']) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $validated['features'])));
        }
        if ($validated['working_hours']) {
            $validated['working_hours'] = array_filter(array_map('trim', explode(",", $validated['working_hours'])));
        }

        // Handle image upload with compression
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            
            // Dosya boyutu ve türü kontrolü
            if (!ImageHelper::checkFileSize($imageFile, 15)) {
                return back()->withErrors(['image' => 'Görsel dosyası 15MB\'dan büyük olamaz.']);
            }
            
            if (!ImageHelper::isValidImageType($imageFile)) {
                return back()->withErrors(['image' => 'Geçersiz görsel formatı. JPG, JPEG, PNG, WEBP, GIF desteklenir.']);
            }
            
            $validated['image'] = ImageHelper::compressAndStore($imageFile, 'tesisler');
        }

        // Handle gallery upload with compression
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                // Dosya boyutu ve türü kontrolü
                if (!ImageHelper::checkFileSize($file, 15)) {
                    return back()->withErrors(['gallery' => 'Galeri görsellerinden biri 15MB\'dan büyük.']);
                }
                
                if (!ImageHelper::isValidImageType($file)) {
                    return back()->withErrors(['gallery' => 'Galeri görselleri için geçersiz format.']);
                }
                
                $gallery[] = ImageHelper::compressAndStore($file, 'tesisler/gallery');
            }
            $validated['gallery'] = $gallery;
        }

        Facility::create($validated);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facilities.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $facility = Facility::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'facility_type' => 'required|string',
            'category' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'opening_date' => 'nullable|date',
            'capacity' => 'nullable|string',
            'features' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'google_maps_link' => 'nullable|url',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360'
        ]);

        // Text alanlarını array'e çevir
        if ($validated['features']) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $validated['features'])));
        }
        if ($validated['working_hours']) {
            $validated['working_hours'] = array_filter(array_map('trim', explode(",", $validated['working_hours'])));
        }

        // Handle image removal
        if ($request->input('remove_image') == '1' && $facility->image) {
            ImageHelper::deleteImage($facility->image);
            $validated['image'] = null;
        }

        // Handle image upload with compression
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            
            // Dosya boyutu ve türü kontrolü
            if (!ImageHelper::checkFileSize($imageFile, 15)) {
                return back()->withErrors(['image' => 'Görsel dosyası 15MB\'dan büyük olamaz.']);
            }
            
            if (!ImageHelper::isValidImageType($imageFile)) {
                return back()->withErrors(['image' => 'Geçersiz görsel formatı. JPG, JPEG, PNG, WEBP, GIF desteklenir.']);
            }
            
            // Delete old image if exists
            if ($facility->image) {
                ImageHelper::deleteImage($facility->image);
            }
            
            $validated['image'] = ImageHelper::compressAndStore($imageFile, 'tesisler');
        }

        // Handle gallery image removals
        $gallery = $facility->gallery ?? [];
        if ($request->input('removed_gallery_images')) {
            $removedIndices = json_decode($request->input('removed_gallery_images'), true);
            if (is_array($removedIndices)) {
                foreach ($removedIndices as $index) {
                    if (isset($gallery[$index])) {
                        ImageHelper::deleteImage($gallery[$index]);
                        unset($gallery[$index]);
                    }
                }
                $gallery = array_values($gallery); // Reindex array
            }
        }

        // Handle new gallery uploads with compression
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                // Dosya boyutu ve türü kontrolü
                if (!ImageHelper::checkFileSize($file, 15)) {
                    return back()->withErrors(['gallery' => 'Galeri görsellerinden biri 15MB\'dan büyük.']);
                }
                
                if (!ImageHelper::isValidImageType($file)) {
                    return back()->withErrors(['gallery' => 'Galeri görselleri için geçersiz format.']);
                }
                
                $gallery[] = ImageHelper::compressAndStore($file, 'tesisler/gallery');
            }
        }
        
        $validated['gallery'] = $gallery;

        $facility->update($validated);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $facility = Facility::findOrFail($id);
        
        // Delete image
        if ($facility->image) {
            ImageHelper::deleteImage($facility->image);
        }
        
        // Delete gallery images
        if ($facility->gallery) {
            foreach ($facility->gallery as $image) {
                ImageHelper::deleteImage($image);
            }
        }
        
        $facility->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla silindi.');
    }
}
