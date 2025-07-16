<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\AdminErrorHandler;
use App\Models\Project;
use App\Models\ProjectLocation;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    use AdminErrorHandler;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->handleIndexOperation(function () {
            $projects = Project::with('locations')
                ->orderBy('sort_order', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();
                
            return view('admin.projects.index', compact('projects'));
        }, $request, 'Projeler yüklenirken bir hata oluştu');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return $this->handleShowOperation(function () {
            return view('admin.projects.create');
        }, $request, 'Proje oluşturma sayfası yüklenirken bir hata oluştu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->handleStoreOperation(function () use ($request) {
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
                'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'locations' => 'required|array|min:1',
                'locations.*.name' => 'required|string|max:255',
                'locations.*.latitude' => 'required|numeric|between:-90,90',
                'locations.*.longitude' => 'required|numeric|between:-180,180',
                'locations.*.description' => 'nullable|string',
                'locations.*.sort_order' => 'nullable|integer|min:0'
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

            // Lokasyon verilerini ayır
            $locationData = $validated['locations'];
            unset($validated['locations']);

            $project = Project::create($validated);

            // Lokasyonları oluştur
            foreach ($locationData as $location) {
                $project->locations()->create([
                    'name' => $location['name'],
                    'latitude' => $location['latitude'],
                    'longitude' => $location['longitude'],
                    'description' => $location['description'] ?? null,
                    'sort_order' => $location['sort_order'] ?? 0,
                ]);
            }

            return $project;
        }, $request, 'Proje başarıyla oluşturuldu', 'Proje oluşturulurken bir hata oluştu', 'admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        return $this->handleShowOperation(function () use ($id) {
            $project = Project::with('locations')->findOrFail($id);
            return view('admin.projects.show', compact('project'));
        }, $request, 'Proje detayı görüntülenirken bir hata oluştu');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        return $this->handleShowOperation(function () use ($id) {
            $project = Project::with('locations')->findOrFail($id);
            return view('admin.projects.edit', compact('project'));
        }, $request, 'Proje düzenleme sayfası yüklenirken bir hata oluştu');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->handleUpdateOperation(function () use ($request, $id) {
            $project = Project::with('locations')->findOrFail($id);
            
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
                'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'locations' => 'nullable|array',
                'locations.*.id' => 'nullable|integer|exists:project_locations,id',
                'locations.*.name' => 'required_with:locations|string|max:255',
                'locations.*.latitude' => 'required_with:locations|numeric|between:-90,90',
                'locations.*.longitude' => 'required_with:locations|numeric|between:-180,180',
                'locations.*.description' => 'nullable|string',
                'locations.*.sort_order' => 'nullable|integer|min:0',
                'deleted_locations' => 'nullable|string'
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

            // Lokasyon yönetimi - eğer locations gönderilmişse
            if (isset($validated['locations']) && is_array($validated['locations'])) {
                $locationData = $validated['locations'];
                
                // Silinen lokasyonları kaldır
                if ($request->filled('deleted_locations')) {
                    $deletedLocationIds = json_decode($request->input('deleted_locations'), true);
                    if (is_array($deletedLocationIds)) {
                        $project->locations()->whereIn('id', $deletedLocationIds)->delete();
                    }
                }

                // Mevcut lokasyonları güncelle ve yenilerini oluştur
                foreach ($locationData as $location) {
                    if (isset($location['id']) && $location['id']) {
                        // Mevcut lokasyonu güncelle
                        $project->locations()->where('id', $location['id'])->update([
                            'name' => $location['name'],
                            'latitude' => $location['latitude'],
                            'longitude' => $location['longitude'],
                            'description' => $location['description'] ?? null,
                            'sort_order' => $location['sort_order'] ?? 0,
                        ]);
                    } else {
                        // Yeni lokasyon oluştur
                        $project->locations()->create([
                            'name' => $location['name'],
                            'latitude' => $location['latitude'],
                            'longitude' => $location['longitude'],
                            'description' => $location['description'] ?? null,
                            'sort_order' => $location['sort_order'] ?? 0,
                        ]);
                    }
                }
            }
            
            // Locations'ı validated array'den çıkar (direkt update'te kullanılmasın)
            unset($validated['locations']);
            unset($validated['deleted_locations']);

            $project->update($validated);

            return $project;
        }, $request, 'Proje başarıyla güncellendi', 'Proje güncellenirken bir hata oluştu', 'admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        return $this->handleDestroyOperation(function () use ($id) {
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

            return true;
        }, $request, 'Proje başarıyla silindi', 'Proje silinirken bir hata oluştu', 'admin.projects.index');
    }
}
