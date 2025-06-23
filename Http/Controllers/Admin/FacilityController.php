<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::latest()->paginate(15);
        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'location' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'area' => 'nullable|numeric|min:0',
            'type' => 'required|string|max:100',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');
        $data['features'] = $request->features ? json_encode($request->features) : null;

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('facilities', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('facilities/gallery', 'public');
            }
            $data['gallery'] = json_encode($gallery);
        }

        Facility::create($data);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla oluşturuldu.');
    }

    public function show(Facility $facility)
    {
        return view('admin.facilities.show', compact('facility'));
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'location' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'area' => 'nullable|numeric|min:0',
            'type' => 'required|string|max:100',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');
        $data['features'] = $request->features ? json_encode($request->features) : null;

        if ($request->hasFile('featured_image')) {
            if ($facility->featured_image) {
                Storage::disk('public')->delete($facility->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('facilities', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($facility->gallery) {
                $oldGallery = json_decode($facility->gallery, true);
                foreach ($oldGallery as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('facilities/gallery', 'public');
            }
            $data['gallery'] = json_encode($gallery);
        }

        $facility->update($data);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla güncellendi.');
    }

    public function destroy(Facility $facility)
    {
        if ($facility->featured_image) {
            Storage::disk('public')->delete($facility->featured_image);
        }

        if ($facility->gallery) {
            $gallery = json_decode($facility->gallery, true);
            foreach ($gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $facility->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Tesis başarıyla silindi.');
    }
} 