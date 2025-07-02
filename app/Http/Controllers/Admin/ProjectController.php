<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
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
            'project_type' => 'required|string',
            'status' => 'required|in:planned,ongoing,completed',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'budget' => 'nullable|numeric',
            'contractor' => 'nullable|string',
            'features' => 'nullable|string',
            'technical_specs' => 'nullable|string',
            'location' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360'
        ]);

        // Convert features and technical_specs from string to array
        if ($request->has('features') && $request->features) {
            $features = array_filter(array_map('trim', explode("\n", $request->features)));
            $validated['features'] = $features;
        } else {
            $validated['features'] = [];
        }

        if ($request->has('technical_specs') && $request->technical_specs) {
            $technical_specs = array_filter(array_map('trim', explode("\n", $request->technical_specs)));
            $validated['technical_specs'] = $technical_specs;
        } else {
            $validated['technical_specs'] = [];
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
            
            $validated['image'] = ImageHelper::compressAndStore($imageFile, 'projeler');
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
                
                $gallery[] = ImageHelper::compressAndStore($file, 'projeler/gallery');
            }
            $validated['gallery'] = $gallery;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proje başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'project_type' => 'required|string',
            'status' => 'required|in:planned,ongoing,completed',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'budget' => 'nullable|numeric',
            'contractor' => 'nullable|string',
            'features' => 'nullable|string',
            'technical_specs' => 'nullable|string',
            'location' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'progress_percentage' => 'nullable|integer|min:0|max:100',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360'
        ]);

        // Convert features and technical_specs from string to array
        if ($request->has('features') && $request->features) {
            $features = array_filter(array_map('trim', explode("\n", $request->features)));
            $validated['features'] = $features;
        } else {
            $validated['features'] = [];
        }

        if ($request->has('technical_specs') && $request->technical_specs) {
            $technical_specs = array_filter(array_map('trim', explode("\n", $request->technical_specs)));
            $validated['technical_specs'] = $technical_specs;
        } else {
            $validated['technical_specs'] = [];
        }

        // Handle image removal
        if ($request->input('remove_image') == '1' && $project->image) {
            ImageHelper::deleteImage($project->image);
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
            if ($project->image) {
                ImageHelper::deleteImage($project->image);
            }
            
            $validated['image'] = ImageHelper::compressAndStore($imageFile, 'projeler');
        }

        // Handle gallery image removals
        $gallery = $project->gallery ?? [];
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
                
                $gallery[] = ImageHelper::compressAndStore($file, 'projeler/gallery');
            }
        }
        
        $validated['gallery'] = $gallery;

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proje başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        
        // Delete image
        if ($project->image) {
            ImageHelper::deleteImage($project->image);
        }
        
        // Delete gallery images
        if ($project->gallery) {
            foreach ($project->gallery as $image) {
                ImageHelper::deleteImage($image);
            }
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proje başarıyla silindi.');
    }
}
