<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\AdminErrorHandler;
use App\Models\News;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    use AdminErrorHandler;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->handleIndexOperation(function () {
            $news = News::orderBy('created_at', 'desc')->get();
            return view('admin.news.index', compact('news'));
        }, $request, 'Haberler yüklenirken bir hata oluştu');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return $this->handleShowOperation(function () {
            return view('admin.news.create');
        }, $request, 'Haber oluşturma sayfası yüklenirken bir hata oluştu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->handleStoreOperation(function () use ($request) {
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
                'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'iframes' => 'nullable|array',
                'iframes.*' => 'nullable|string'
            ]);

            // Tags text'ini array'e çevir
            if ($validated['tags']) {
                $validated['tags'] = array_filter(array_map('trim', explode(",", $validated['tags'])));
            }

            // iframe'leri temizle ve filtrele
            if (!empty($validated['iframes'])) {
                $validated['iframes'] = array_filter($validated['iframes'], function($iframe) {
                    return !empty(trim($iframe));
                });
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

            $news = News::create($validated);
            
            return $news;
        }, $request, 'Haber başarıyla oluşturuldu', 'Haber oluşturulurken bir hata oluştu', 'admin.news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        return $this->handleShowOperation(function () use ($id) {
            $news = News::findOrFail($id);
            return view('admin.news.show', compact('news'));
        }, $request, 'Haber detayı görüntülenirken bir hata oluştu');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        return $this->handleShowOperation(function () use ($id) {
            $news = News::findOrFail($id);
            return view('admin.news.edit', compact('news'));
        }, $request, 'Haber düzenleme sayfası yüklenirken bir hata oluştu');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->handleUpdateOperation(function () use ($request, $id) {
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
                'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'iframes' => 'nullable|array',
                'iframes.*' => 'nullable|string'
            ]);

            // Tags text'ini array'e çevir
            if ($validated['tags']) {
                $validated['tags'] = array_filter(array_map('trim', explode(",", $validated['tags'])));
            }

            // iframe'leri temizle ve filtrele
            if (!empty($validated['iframes'])) {
                $validated['iframes'] = array_filter($validated['iframes'], function($iframe) {
                    return !empty(trim($iframe));
                });
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

            return $news;
        }, $request, 'Haber başarıyla güncellendi', 'Haber güncellenirken bir hata oluştu', 'admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        return $this->handleDestroyOperation(function () use ($id) {
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

            return true;
        }, $request, 'Haber başarıyla silindi', 'Haber silinirken bir hata oluştu', 'admin.news.index');
    }
}
