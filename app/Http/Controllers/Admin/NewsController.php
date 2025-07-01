<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string',
            'tags' => 'nullable|string',
            'author' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'allow_comments' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360'
        ]);

        // Tags text'ini array'e çevir
        if ($validated['tags']) {
            $validated['tags'] = array_filter(array_map('trim', explode(",", $validated['tags'])));
        }

        // Handle featured image upload with compression
        if ($request->hasFile('featured_image')) {
            $imageFile = $request->file('featured_image');
            
            // Dosya boyutu ve türü kontrolü
            if (!ImageHelper::checkFileSize($imageFile, 15)) {
                return back()->withErrors(['featured_image' => 'Görsel dosyası 15MB\'dan büyük olamaz.']);
            }
            
            if (!ImageHelper::isValidImageType($imageFile)) {
                return back()->withErrors(['featured_image' => 'Geçersiz görsel formatı. JPG, JPEG, PNG, WEBP, GIF desteklenir.']);
            }
            
            $validated['featured_image'] = ImageHelper::compressAndStore($imageFile, 'news');
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
                
                $gallery[] = ImageHelper::compressAndStore($file, 'news/gallery');
            }
            $validated['gallery'] = $gallery;
        }

        // Set published_at if status is published
        if ($validated['status'] === 'published' && !isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Haber başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string',
            'tags' => 'nullable|string',
            'author' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'allow_comments' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360'
        ]);

        // Tags text'ini array'e çevir
        if ($validated['tags']) {
            $validated['tags'] = array_filter(array_map('trim', explode(",", $validated['tags'])));
        }

        // Handle featured image removal
        if ($request->input('remove_featured_image') == '1' && $news->featured_image) {
            ImageHelper::deleteImage($news->featured_image);
            $validated['featured_image'] = null;
        }

        // Handle featured image upload with compression
        if ($request->hasFile('featured_image')) {
            $imageFile = $request->file('featured_image');
            
            // Dosya boyutu ve türü kontrolü
            if (!ImageHelper::checkFileSize($imageFile, 15)) {
                return back()->withErrors(['featured_image' => 'Görsel dosyası 15MB\'dan büyük olamaz.']);
            }
            
            if (!ImageHelper::isValidImageType($imageFile)) {
                return back()->withErrors(['featured_image' => 'Geçersiz görsel formatı. JPG, JPEG, PNG, WEBP, GIF desteklenir.']);
            }
            
            // Delete old image if exists
            if ($news->featured_image) {
                ImageHelper::deleteImage($news->featured_image);
            }
            $validated['featured_image'] = ImageHelper::compressAndStore($imageFile, 'news');
        }

        // Handle gallery image removals
        $gallery = $news->gallery ?? [];
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
                
                $gallery[] = ImageHelper::compressAndStore($file, 'news/gallery');
            }
        }
        
        $validated['gallery'] = $gallery;

        // Set published_at if status is published
        if ($validated['status'] === 'published' && !$news->published_at) {
            $validated['published_at'] = now();
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Haber başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        
        // Delete featured image
        if ($news->featured_image) {
            ImageHelper::deleteImage($news->featured_image);
        }
        
        // Delete gallery images
        if ($news->gallery) {
            foreach ($news->gallery as $image) {
                ImageHelper::deleteImage($image);
            }
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Haber başarıyla silindi.');
    }
}
