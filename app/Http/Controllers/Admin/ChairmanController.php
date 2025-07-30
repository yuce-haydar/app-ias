<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chairman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper;

class ChairmanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chairmen = Chairman::ordered()->get();
        return view('admin.chairmen.index', compact('chairmen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chairmen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'biography' => 'required|string',
            'education' => 'nullable|string|max:500',
            'experience' => 'nullable|string|max:500',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB'a çıkarttık
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB'a çıkarttık
            'achievements' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['main_image', 'gallery']);

        // Ana resim yükle
        if ($request->hasFile('main_image')) {
            $data['main_image'] = ImageHelper::compressAndStore(
                $request->file('main_image'),
                'chairman/main',
                1200, // Boyutu artırdık
                900,  // Boyutu artırdık
                90    // Kaliteyi artırdık
            );
        }

        // Galeri resimleri yükle
        if ($request->hasFile('gallery')) {
            $gallery = ImageHelper::compressAndStoreMultiple(
                $request->file('gallery'),
                'chairman/gallery',
                1600, // Boyutu artırdık
                1200, // Boyutu artırdık
                90    // Kaliteyi artırdık
            );
            $data['gallery'] = $gallery;
        }

        // Başarıları array'e çevir
        if ($request->achievements) {
            $achievements = array_filter(explode("\n", $request->achievements));
            $data['achievements'] = array_map('trim', $achievements);
        }

        Chairman::create($data);

        return redirect()->route('admin.chairmen.index')
            ->with('success', 'Başkan bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chairman $chairman)
    {
        return view('admin.chairmen.show', compact('chairman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chairman $chairman)
    {
        return view('admin.chairmen.edit', compact('chairman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chairman $chairman)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'biography' => 'required|string',
            'education' => 'nullable|string|max:500',
            'experience' => 'nullable|string|max:500',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB'a çıkarttık
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB'a çıkarttık
            'achievements' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['main_image', 'gallery']);

        // Ana resim güncelle
        if ($request->hasFile('main_image')) {
            // Eski resmi sil
            if ($chairman->main_image) {
                ImageHelper::deleteImage($chairman->main_image);
            }
            
            $data['main_image'] = ImageHelper::compressAndStore(
                $request->file('main_image'),
                'chairman/main',
                1200, // Boyutu artırdık
                900,  // Boyutu artırdık
                90    // Kaliteyi artırdık
            );
        }

        // Galeri güncelle
        if ($request->hasFile('gallery')) {
            // Eski galeri resimlerini sil
            if ($chairman->gallery && is_array($chairman->gallery)) {
                foreach ($chairman->gallery as $image) {
                    ImageHelper::deleteImage($image);
                }
            }
            
            $gallery = ImageHelper::compressAndStoreMultiple(
                $request->file('gallery'),
                'chairman/gallery',
                1600, // Boyutu artırdık
                1200, // Boyutu artırdık
                90    // Kaliteyi artırdık
            );
            $data['gallery'] = $gallery;
        }

        // Başarıları array'e çevir
        if ($request->achievements) {
            $achievements = array_filter(explode("\n", $request->achievements));
            $data['achievements'] = array_map('trim', $achievements);
        }

        $chairman->update($data);

        return redirect()->route('admin.chairmen.index')
            ->with('success', 'Başkan bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chairman $chairman)
    {
        // Resimleri sil
        if ($chairman->main_image) {
            ImageHelper::deleteImage($chairman->main_image);
        }
        
        if ($chairman->gallery && is_array($chairman->gallery)) {
            foreach ($chairman->gallery as $image) {
                ImageHelper::deleteImage($image);
            }
        }

        $chairman->delete();

        return redirect()->route('admin.chairmen.index')
            ->with('success', 'Başkan bilgileri başarıyla silindi.');
    }

    /**
     * Toggle status
     */
    public function toggleStatus(Chairman $chairman)
    {
        $chairman->update(['is_active' => !$chairman->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $chairman->is_active,
            'message' => $chairman->is_active ? 'Başkan aktif edildi.' : 'Başkan pasif edildi.'
        ]);
    }
}
